<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }

        if (auth()->user()) {
            User::findOrFail(auth()->user()->id)->update(['language' => $lang]);
        }

        return Redirect::back();
    }
}
