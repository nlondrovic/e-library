<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        if($request->holding_time){
            DB::table('settings')->where('variable', '=', 'Holding time')->update(['value' => $request->holding_time ]);
        }
        if($request->reservation_time){
            DB::table('settings')->where('variable', '=', 'Reservation time')->update(['value' => $request->reservation_time ]);
        }
        if($request->overdue_time){
            DB::table('settings')->where('variable', '=', 'Overdue time')->update(['value' => $request->overdue_time ]);
        }
        return redirect()->route('settings.index');
    }
    public function index()
    {
        return view('settings.policy.index');
    }
}
