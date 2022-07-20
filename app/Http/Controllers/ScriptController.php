<?php

namespace App\Http\Controllers;

use App\Models\Script;
use App\Http\Requests\StoreScriptRequest;
use App\Http\Requests\UpdateScriptRequest;

class ScriptController extends Controller
{
    public function index()
    {
        return view('master.settings.scripts.index');
    }

    public function create()
    {
        //
    }

    public function store(StoreScriptRequest $request)
    {
        //
    }

    public function show(Script $script)
    {
        //
    }

    public function edit(Script $script)
    {
        //
    }

    public function update(UpdateScriptRequest $request, Script $script)
    {
        //
    }

    public function destroy(Script $script)
    {
        //
    }
}
