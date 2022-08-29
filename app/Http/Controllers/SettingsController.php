<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        $holding_time = DB::table('settings')
            ->where('variable', 'Holding time')->first()->value;

        $reservation_time = DB::table('settings')
            ->where('variable', 'Reservation time')->first()->value;

        $books_per_student = DB::table('settings')
            ->where('variable', 'Books per student')->first()->value;

        return view('settings.policy.index',
            compact('holding_time', 'reservation_time', 'books_per_student')
        );
    }

    public function update(Request $request)
    {
        if ($request->holding_time) {
            DB::table('settings')->where('variable', 'Holding time')
                ->update(['value' => $request->holding_time]);
        }

        if ($request->reservation_time) {
            DB::table('settings')->where('variable', 'Reservation time')
                ->update(['value' => $request->reservation_time]);
        }

        if ($request->books_per_student) {
            DB::table('settings')->where('variable', 'Books per student')
                ->update(['value' => $request->books_per_student]);
        }

        return redirect()->route('settings.index');
    }
}
