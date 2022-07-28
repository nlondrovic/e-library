<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\User;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(\Illuminate\Http\Request $request)
    {
        $students = User::where('role_id', '=', 3)->get();

        $book = Book::findOrFail($request->book_id);

        return view('master.reservations.create', compact('students', 'book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
//        dd($request->all());

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
