<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Book;
use App\Models\Checkout;
use App\Models\Reservation;
use App\Models\ReservationRequest;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function dashboard()
    {
        $checkouts_count = count(Checkout::where('end_time', null)->get());
        $reserved_count = count(Reservation::where('end_time', null)->get());
        $overdue_count = count(Checkout::where('start_time', '<', Carbon::now()->subDays(20)->toDateTimeString())
            ->where('end_time', null)->get());
        $activities = Activity::orderBy('id', 'desc')->take(15)->get();

        $reservationRequests = ReservationRequest::where('status', 'pending')->take(5)->get();

        return view('components.dashboard.index',
            compact('checkouts_count', 'reserved_count', 'overdue_count',
                'activities', 'reservationRequests')
        );
    }

    public function activities()
    {
        $activitiesQuery = Activity::query();

        if (request()->get('type')) {
            $activitiesQuery->where('type', request()->get('type'));
        }

        if (request()->get('book_id')) {
            $activitiesQuery->where('book_id', request()->get('book_id'));
        }

        if (request()->get('student_id')) {
            $activitiesQuery->where('student_id', request()->get('student_id'));
        }

        if (request()->get('librarian_id')) {
            $activitiesQuery->where('librarian_id', request()->get('librarian_id'));
        }

        if (request()->get('start_date')) {
            $activitiesQuery->where('time', '>', request()->get('start_date'));
        }

        if (request()->get('end_date')) {
            $activitiesQuery->where('time', '<', request()->get('end_date'));
        }

        $activities = $activitiesQuery->orderBy('time', 'desc')->get();

        $books = Book::all();
        $students = User::where('role_id', 3)->get();
        $librarians = User::where('role_id', 2)->get();

        return view('components.dashboard.activities',
            compact('activities', 'books', 'librarians', 'students')
        );
    }
}
