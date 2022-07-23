<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScriptRequest;
use App\Http\Requests\UpdateScriptRequest;
use App\Models\Script;

class ScriptController extends Controller
{
    public function index()
    {
        $scripts = Script::all();
        return view('master.settings.scripts.index', compact('scripts'));
    }

    public function create()
    {
        return view('master.settings.scripts.create');
    }

    public function store(StoreScriptRequest $request)
    {
        Script::create($request->validated());

        return redirect()->route('scripts.index');
    }

    public function edit(Script $script)
    {
        return view('master.settings.scripts.edit', compact('script'));
    }

    public function update(UpdateScriptRequest $request, Script $script)
    {
        $script->update($request->validated());

        return redirect()->route('scripts.index');
    }

    public function destroy(Script $script)
    {
        $script->delete();
        return redirect()->route('scripts.index');
    }
}
