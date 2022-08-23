<?php

namespace App\Http\Controllers;

use App\Models\Binding;
use App\Http\Requests\StoreBindingRequest;
use App\Http\Requests\UpdateBindingRequest;

class BindingController extends Controller
{
    public function index()
    {
        $bindings = Binding::orderBy('name', 'asc')->paginate(5);

        return view('settings.bindings.index', compact('bindings'));
    }

    public function create()
    {
        return view('settings.bindings.create');
    }

    public function store(StoreBindingRequest $request)
    {
        $inputs = $request->validated();

        Binding::create($inputs);

        return redirect()->route('bindings.index');
    }

    public function edit(Binding $binding)
    {
        return view('settings.bindings.edit', compact('binding'));
    }

    public function update(UpdateBindingRequest $request, Binding $binding)
    {
        $inputs = $request->validated();

        $binding->update($inputs);

        return redirect()->route('bindings.index');
    }

    public function destroy(Binding $binding)
    {
        $binding->delete();

        return redirect()->route('bindings.index');
    }
}
