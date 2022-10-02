<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\ReservationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationRequestController extends Controller
{
    public function index()
    {
        $reservation_requests = ReservationRequest::where('status', 'Pending')->get();
        return view('components.dashboard.reservation-requests', compact('reservation_requests'));
    }

    public function approve(ReservationRequest $reservationRequest)
    {
        DB::transaction(function () use ($reservationRequest) {
            $inputs = [
                'book_id' => $reservationRequest->book->id,
                'student_id' => $reservationRequest->student->id,
                'librarian_id' => auth()->user()->id,
                'start_time' => now()
            ];
            $reservation = Reservation::create($inputs);

            $reservationRequest->update([
                'status' => 'Approved',
                'librarian_id' => auth()->user()->id
            ]);

            $book = Book::findOrFail($reservationRequest->book->id);
            $book->update(['reserved_count' => ++$book->reserved_count]);

            Activity::create([
                'book_id' => $reservation['book_id'],
                'student_id' => $reservation['student_id'],
                'librarian_id' => $reservation['librarian_id'],
                'time' => $reservation['start_time'],
                'type' => 'Reservation',
                'activity_id' => $reservation['id']
            ]);
        });

        return redirect()->route('dashboard')->with('flash-success', __('Reservation approved!'));
    }

    public function reject(ReservationRequest $reservationRequest)
    {
        $reservationRequest->update([
            'status' => 'Rejected',
            'librarian_id' => auth()->user()->id
        ]);

        return redirect()->route('dashboard')->with('flash-success', __('Reservation rejected!'));
    }
}
