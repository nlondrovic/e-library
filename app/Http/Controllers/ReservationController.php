<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Book;
use App\Models\Checkout;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Models\User;
use Carbon\Carbon;
use \Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ReservationController extends Controller
{

    public function archivedReservations()
    {
        $reservations = Reservation::where('reservation_end_reason_id', '>', 0)->get();
        return view('master.transactions.reservations.archived', compact('reservations'));
    }

    public function activeReservations()
    {
        $reservations = Reservation::where('end_time', null)->get();
        return view('master.transactions.reservations.active', compact('reservations'));
    }

    public function create(Book $book)
    {
        $students = User::where('role_id', 3)->get();

        return view('master.transactions.reservations.create', compact('students', 'book'));
    }

    public function store(StoreReservationRequest $request)
    {
        $book = Book::findOrFail($request['book_id']);
        if ($book->available_count <= 0) {
            return redirect()->back()->withErrors([
                'message' => 'All copies of this book are checked out or reserved.'
            ]);
        }

        $book->update(['reserved_count', ++$book->reserved_count]);
        $inputs = $request->validated();
        $inputs['librarian_id'] = auth()->id();

        Reservation::query()->create($inputs);

        return redirect()->route('books.index');
    }

    public function checkOut(Reservation $reservation)
    {
        $reservation->update([
            'reservation_end_reason_id' => 3,
            'end_time' => Carbon::parse(now())
        ]);

        $inputs = [
            'book_id' => $reservation['book_id'],
            'checkout_librarian_id' => auth()->id(),
            'student_id' => $reservation['student_id'],
            'start_time' => Carbon::parse(now()),
        ];
        Checkout::query()->create($inputs);

        $book = Book::findOrFail($reservation['book_id']);
        $book->update([
            'reserved_count' => --$book->reserved_count,
            'checkouts_count' => ++$book->checkouts_count
        ]);

        return redirect()->route('reservations.active');
    }

    public function cancel(Reservation $reservation)
    {
        $reservation->update([
            'reservation_end_reason_id' => 2,
            'end_time' => Carbon::parse(now())
        ]);

        $book = Book::findOrFail($reservation['book_id']);
        $book->update([
            'reserved_count' => --$book->reserved_count
        ]);

        return redirect()->route('reservations.active');
    }

    public function show(Reservation $reservation)
    {
        $book = Book::findOrFail($reservation['book_id']);
        return view('master.transactions.reservations.show', compact(['reservation', 'book']));
    }

}
