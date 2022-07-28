<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Models\User;
use Carbon\Carbon;
use \Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function create(Request $request)
    {
        $students = User::where('role_id', '=', 3)->get();
        $book = Book::findOrFail($request->book_id);

        return view('master.reservations.create', compact('students', 'book'));
    }

    public function store(StoreReservationRequest $request)
    {
        Reservation::query()->create([
            'book_id' => $request->book_id,
            'student_id' => $request->student_id,
            'librarian_id' => auth()->user()->id,
            'start_time' => $request->start_time,
            'end_time' => Carbon::parse($request->start_time)->addDays(getenv('reservation_time'))->toDateTime(),
            'end_reason_id' => null,
        ]);

        return redirect()->route('reservations.index');
    }
}
