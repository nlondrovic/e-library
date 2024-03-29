<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScriptRequest;
use App\Http\Requests\UpdateScriptRequest;
use App\Models\Script;

class ScriptController extends Controller
{
    public function index()
    {
        $scripts = Script::orderBy('name', 'asc')->paginate(8);
        return view('settings.scripts.index', compact('scripts'));
    }

    public function create()
    {
        return view('settings.scripts.create');
    }

    public function store(StoreScriptRequest $request)
    {
        Script::create($request->validated());
        return redirect()->route('scripts.index')->with('flash-success', __('Script created successfully!'));
    }

    public function edit(Script $script)
    {
        return view('settings.scripts.edit', compact('script'));
    }

    public function show()
    {
        return view('errors.404');
    }

    public function update(UpdateScriptRequest $request, Script $script)
    {
        $script->update($request->validated());
        return redirect()->route('scripts.index')->with('flash-success', __('Script updated successfully!'));
    }

    public function destroy(Script $script)
    {
        $script->delete();
        return redirect()->route('scripts.index')->with('flash-success', __('Script deleted successfully!'));
    }
}
