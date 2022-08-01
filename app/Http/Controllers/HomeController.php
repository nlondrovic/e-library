<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Reservation;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function policy()
    {
        return view('master.settings.policy.index');
    }

    public function dashboard()
    {
        $checkouts = count(Checkout::where('end_time', null)->get());
        $reserved = count(Reservation::where('end_time', null)->get());
        $overdues = count(Checkout::where('start_time', '<', Carbon::now()->subDays(20)->toDateTimeString())
            ->where('end_time', null)
            ->get());

        return view('dashboard', compact('checkouts', 'reserved', 'overdues'));
    }
}
