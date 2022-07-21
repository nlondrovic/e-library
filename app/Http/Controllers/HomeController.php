<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function policy()
    {
        return view('master.settings.policy.index');
    }
}
