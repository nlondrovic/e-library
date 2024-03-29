<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Activity;
use App\Models\Book;
use App\Models\Checkout;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function activeReservations(Request $request)
    {
        $reservationsQuery = Reservation::where('end_time', null);
        $book_ids = $reservationsQuery->pluck('book_id')->toArray();
        $student_ids = $reservationsQuery->pluck('student_id')->toArray();
        $librarian_ids = $reservationsQuery->pluck('librarian_id')->toArray();
        $books = Book::whereIn('id', $book_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();
        $checkout_librarians = User::whereIn('id', $librarian_ids)->get();

        if ($request->get('student_ids')) {
            $reservationsQuery->whereIn('student_id', $request->get('student_ids'));
        }
        if ($request->get('checkout_librarian_ids')) {
            $reservationsQuery->whereIn('librarian_id', $request->get('checkout_librarian_ids'));
        }
        if ($request->get('book_ids')) {
            $reservationsQuery->whereIn('book_id', $request->get('book_ids'));
        }
        if ($request->get('start_time')) {
            $reservationsQuery->where('start_time', '>', $request->get('start_time'));
        }
        if ($request->get('end_time')) {
            $reservationsQuery->where('start_time', '<', $request->get('end_time'));
        }
        $reservations = $reservationsQuery->orderBy('id', 'desc')->paginate(8);
        if (empty($reservations->toArray())) {
            return view('transactions.index');
        }
        return view('transactions.reservations.active',
            compact('reservations', 'students', 'books', 'checkout_librarians')
        );
    }

    public function archivedReservations(Request $request)
    {
        $reservationsQuery = Reservation::where('reservation_end_reason_id', '!=', null);
        $book_ids = $reservationsQuery->pluck('book_id')->toArray();
        $student_ids = $reservationsQuery->pluck('student_id')->toArray();
        $librarian_ids = $reservationsQuery->pluck('librarian_id')->toArray();
        $books = Book::whereIn('id', $book_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();
        $checkout_librarians = User::whereIn('id', $librarian_ids)->get();

        if ($request->get('student_ids')) {
            $reservationsQuery->whereIn('student_id', $request->get('student_ids'));
        }
        if ($request->get('checkout_librarian_ids')) {
            $reservationsQuery->whereIn('librarian_id', $request->get('checkout_librarian_ids'));
        }
        if ($request->get('book_ids')) {
            $reservationsQuery->whereIn('book_id', $request->get('book_ids'));
        }
        if ($request->get('start_time')) {
            $reservationsQuery->where('start_time', '>', $request->get('start_time'));
        }
        if ($request->get('end_time')) {
            $reservationsQuery->where('start_time', '<', $request->get('end_time'));
        }
        $reservations = $reservationsQuery->orderBy('id', 'desc')->paginate(8);
        if (empty($reservations->toArray())) {
            return view('transactions.index');
        }
        return view('transactions.reservations.archived',
            compact('reservations', 'students', 'books', 'checkout_librarians')
        );
    }

    public function create(Book $book)
    {
        $students = User::where('role_id', 3)->get();
        $min_date = Carbon::now()->addDay()->format('Y-m-d');
        $max_date = Carbon::now()->addMonth()->format('Y-m-d');
        $activities = Activity::where('book_id', $book->id)->orderBy('id', 'desc')->take(4)->get();

        return view('transactions.reservations.create',
            compact('students', 'book', 'min_date', 'max_date', 'activities')
        );
    }

    public function store(StoreReservationRequest $request)
    {
        $book = Book::findOrFail($request['book_id']);
        $student = User::findOrFail($request['student_id']);

        if (!$student->canCheckoutOrReserveMoreBooks()) {
            return redirect()->back()->withErrors([
                'message' => __('This student has checked out or reserved maximum number of books.')
            ]);
        }

        if ($student->canNotReserveBook($book->id)) {
            return redirect()->back()->withErrors([
                'message' => __('This student has already reserved this book.')
            ]);
        }

        if ($book->available_count < 1) {
            return redirect()->back()->withErrors([
                'message' => __('All copies of this book are checked out or reserved.')
            ]);
        }

        DB::transaction(function () use ($book, $request) {
            $inputs = $request->validated();
            $inputs['librarian_id'] = auth()->id();
            $reservation = Reservation::create($inputs);

            $book->update(['reserved_count', ++$book->reserved_count]);

            Activity::create([
                'book_id' => $reservation['book_id'],
                'student_id' => $reservation['student_id'],
                'librarian_id' => $reservation['librarian_id'],
                'time' => now(),
                'type' => 'Reservation',
                'activity_id' => $reservation['id']
            ]);
        });

        return redirect()->route('books.index')->with('flash-success', __('Reservation created successfully!'));
    }

    public function checkOut(Reservation $reservation)
    {
        DB::transaction(function () use ($reservation) {
            $inputs = [
                'book_id' => $reservation['book_id'],
                'checkout_librarian_id' => auth()->id(),
                'student_id' => $reservation['student_id'],
                'start_time' => now()
            ];
            $checkout = Checkout::create($inputs);

            $reservation->update([
                'reservation_end_reason_id' => 3,
                'end_time' => now()
            ]);

            $book = Book::findOrFail($reservation['book_id']);
            $book->update([
                'reserved_count' => --$book->reserved_count,
                'checkouts_count' => ++$book->checkouts_count
            ]);

            Activity::create([
                'book_id' => $checkout['book_id'],
                'student_id' => $checkout['student_id'],
                'librarian_id' => $checkout['checkout_librarian_id'],
                'time' => now(),
                'type' => 'Reservation',
                'activity_id' => $checkout['id']
            ]);
        });

        return redirect()->route('reservations.active')->with('flash-success', __('Checkout created successfully!'));
    }

    public function cancel(Reservation $reservation)
    {
        DB::transaction(function () use ($reservation) {
            $reservation->update([
                'reservation_end_reason_id' => 2,
                'end_time' => now()
            ]);

            $book = Book::findOrFail($reservation['book_id']);
            $book->update(['reserved_count' => --$book->reserved_count]);
        });

        return redirect()->route('reservations.active');
    }

    public function show(Reservation $reservation)
    {
        $book = Book::findOrFail($reservation['book_id']);
        return view('transactions.reservations.show',
            compact('reservation', 'book'))->with('flash-success', __('Reservation cancelled successfully!'));
    }
}
