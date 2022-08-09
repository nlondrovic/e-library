<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Checkout;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function policy()
    {
        return view('master.settings.policy.index');
    }

    public function dashboard()
    {
        $checkouts_count = count(Checkout::where('end_time', null)->get());
        $reserved_count = count(Reservation::where('end_time', null)->get());
        $overdue_count = count(Checkout::where('start_time', '<', Carbon::now()->subDays(20)->toDateTimeString())
            ->where('end_time', null)
            ->get());
        $activities = Checkout::all();

        return view('dashboard', compact('checkouts_count', 'reserved_count', 'overdue_count', 'activities'));

    }

    public function show_more()
    {
        $activities2 = Checkout::all();

        return view('dashboardActivity', compact( 'activities2'));
    }
}
