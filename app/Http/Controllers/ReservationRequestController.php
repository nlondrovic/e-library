<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Activity;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\ReservationRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReservationRequestController extends Controller
{
    public function index()
    {
        $reservationRequests = ReservationRequest::where('status', 'pending')->get();

        return view('components.dashboard.reservationRequests', compact('reservationRequests'));
    }

    public function approve(ReservationRequest $reservationRequest)
    {
        $book = Book::findOrFail($reservationRequest['book_id']);
        $student = User::findOrFail($reservationRequest['student_id']);

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

        // Create reservation, update book counts, create an activity and change request status
        DB::transaction(function () use ($book, $reservationRequest) {
            $inputs['book_id'] = $reservationRequest['book_id'];
            $inputs['student_id'] = $reservationRequest['student_id'];
            $inputs['start_time'] = $reservationRequest['start_time'];
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

            $reservationRequest->update([
                'status' => 'approved',
                'end_time' => now(),
                'librarian_id' => auth()->id()
            ]);
        });

        return redirect()->back()->with('flash-reservation-store-success', __('Reservation approved!'));
    }

    public function decline(ReservationRequest $reservationRequest)
    {
        $reservationRequest->update([
            'status' => 'declined',
            'end_time' => now(),
            'librarian_id' => auth()->id()
        ]);

        return redirect()->back()->with('flash-reservation-store-success', __('Reservation declined!'));
    }
}
