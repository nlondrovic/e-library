<?php

namespace App\Http\Controllers;

use App\Models\Book;
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

//    public function pendingReservations()
//    {
//        $reservations = Reservation::where('end_time', null)->where('is_active', false)->get();
//        return view('master.transactions.reservations.pending', compact('reservations'));
//    }

    public function activeReservations()
    {
        $reservations = Reservation::where('end_time', null)->get();
        return view('master.transactions.reservations.active', compact('reservations'));
    }

    public function create(Request $request)
    {
        $students = User::where('role_id', 3)->get();
        $book = Book::findOrFail($request->book_id);

        return view('master.transactions.reservations.create', compact('students', 'book'));
    }

    public function store(StoreReservationRequest $request)
    {
        Reservation::query()->create($request->validated());

        return redirect()->route('books.index');
    }

    public function show(Reservation $reservation)
    {
        // za sad nista
    }

    public function checkOut(Reservation $reservation)
    {
        $reservation->update(['reservation_end_reason_id' => 3, 'end_time' => Carbon::parse(now())]);
        // $book->reserved_count se smanjuje
        // $book->checkout_count se povecava
        // kreira se checkout sa podacima: book_id, checkout_librarian_id, student_id, start_time
    }

    public function cancel(Reservation $reservation)
    {
        $reservation->update(['reservation_end_reason_id' => 2, 'end_time' => Carbon::parse(now())]);
//        dd($reservation);
        return redirect()->route('reservations.active');
    }

//    public function deny(Reservation $reservation)
//    {
//
//    }

//    public function accept(Reservation $reservation)
//    {
//        $reservation->update(['is_active'=>true]);
////        dd($reservation);
//        return redirect()->route('reservations.pending');
//    }

}
