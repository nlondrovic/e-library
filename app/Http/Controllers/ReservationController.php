<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Activity;
use App\Models\Book;
use App\Models\Checkout;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class ReservationController extends Controller
{
    // TODO: MORAMO ocistiti ovaj kod! Ima dosta stvari koje se ponavljaju! Nije citljivo.

    public function activeReservations(Request $request)
    {
        $reservationsQuery = Reservation::where('end_time', null);
        $student = null;
        $book = null;

        if ($request->get('student_id')) {
            $reservationsQuery->where('student_id', $request->get('student_id'));
            $student = User::findOrFail($request['student_id']);
        }

        if ($request->get('book_id')) {
            $reservationsQuery->where('book_id', $request->get('book_id'));
            $book = Book::findOrFail($request['book_id']);
        }

        $books_ids = $reservationsQuery->pluck('book_id')->toArray();
        $student_ids = $reservationsQuery->pluck('student_id')->toArray();
        $reservations = $reservationsQuery->orderBy('id', 'desc')->paginate(5);

        if (empty($reservations->toArray())) return view('transactions.index');

        $books = Book::whereIn('id', $books_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();

        return view('transactions.reservations.active',
            compact('reservations', 'student', 'book', 'students', 'books'));
    }

    public function archivedReservations(Request $request)
    {
        $reservationsQuery = Reservation::where('reservation_end_reason_id', '!=', null);
        $student = null;
        $book = null;

        if ($request->get('student_id')) {
            $reservationsQuery->where('student_id', $request->get('student_id'));
            $student = User::findOrFail($request['student_id']);
        }

        if ($request->get('book_id')) {
            $reservationsQuery->where('book_id', $request->get('book_id'));
            $book = Book::findOrFail($request['book_id']);
        }

        $books_ids = $reservationsQuery->pluck('book_id')->toArray();
        $student_ids = $reservationsQuery->pluck('student_id')->toArray();
        $reservations = $reservationsQuery->orderBy('id', 'desc')->paginate(5);

        if (empty($reservations->toArray())) return view('transactions.index');

        $books = Book::whereIn('id', $books_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();

        return view('transactions.reservations.archived',
            compact('reservations', 'student', 'book', 'students', 'books'));
    }

    public function create(Book $book)
    {
        $students = User::where('role_id', 3)->get();
        $min_date = Carbon::now()->addDay()->format('Y-m-d');
        $max_date = Carbon::now()->addMonth()->format('Y-m-d');

        return view('transactions.reservations.create', compact('students', 'book', 'min_date', 'max_date'));
    }

    public function store(StoreReservationRequest $request)
    {
        $book = Book::findOrFail($request['book_id']);
        $student = User::findOrFail($request['student_id']);

        if (!$student->canCheckoutMoreBooks($student)) {
            return redirect()->back()->withErrors([
                'message' => 'This student has checked out or reserved maximum number of books'
            ]);
        }
        if($student->canReserveBook($request['book_id'])){
            return redirect()->back()->withErrors([
                'message' => 'This student has already reserved this book.'
            ]);
        }
        if ($book->available_count <= 0) {
            return redirect()->back()->withErrors([
                'message' => 'All copies of this book are checked out or reserved.'
            ]);
        }

        $inputs = $request->validated();
        $inputs['librarian_id'] = auth()->id();

        $reservation = Reservation::query()->create($inputs);

        DB::transaction(function () use ($book, $inputs) {
            $book->update(['reserved_count', ++$book->reserved_count]);
            $reservation = Reservation::query()->create($inputs);
            Activity::create([
                'book_id' => $reservation['book_id'],
                'student_id' => $reservation['student_id'],
                'librarian_id' => $reservation['checkout_librarian_id'],
                'time' => $reservation['start_time'],
                'type' => 'Reservation',
                'activity_id' => $reservation['id'],
            ]);
        });

        return redirect()->route('books.index');
    }

    public function checkOut(Reservation $reservation)
    {
        $book = Book::findOrFail($reservation['book_id']);
        $inputs = [
            'book_id' => $reservation['book_id'],
            'checkout_librarian_id' => auth()->id(),
            'student_id' => $reservation['student_id'],
            'start_time' => Carbon::parse(now()),
        ];




        DB::transaction(function () use ($book, $inputs, $reservation) {
            $book->update([
                'reserved_count' => --$book->reserved_count,
                'checkouts_count' => ++$book->checkouts_count
            ]);
            $reservation->update([
                'reservation_end_reason_id' => 3,
                'end_time' => Carbon::parse(now())
            ]);
            $checkout = Checkout::query()->create($inputs);

            Activity::create([
                'book_id' => $checkout['book_id'],
                'student_id' => $checkout['student_id'],
                'librarian_id' => $checkout['checkin_librarian_id'],
                'time' => $checkout['start_time'],
                'type' => 'Reservation',
                'activity_id' => $checkout['id'],
            ]);
        });

        return redirect()->route('reservations.active');
    }

    public function cancel(Reservation $reservation)
    {
        $book = Book::findOrFail($reservation['book_id']);
        $reservation->update([
            'reservation_end_reason_id' => 2,
            'end_time' => Carbon::parse(now())
        ]);
        $book->update([
            'reserved_count' => --$book->reserved_count
        ]);
        DB::transaction(function () use ($book, $reservation) {
            $reservation->update([
                'reservation_end_reason_id' => 2,
                'end_time' => Carbon::parse(now())
            ]);
            $book->update([
                'reserved_count' => --$book->reserved_count
            ]);
        });

        return redirect()->route('reservations.active');
    }

    public function show(Reservation $reservation)
    {
        $book = Book::findOrFail($reservation['book_id']);
        return view('transactions.reservations.show', compact(['reservation', 'book']));
    }

}
