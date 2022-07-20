<?php

namespace App\Http\Controllers;

use App\Models\Binding;
use App\Http\Requests\StoreBindingRequest;
use App\Http\Requests\UpdateBindingRequest;

class BindingController extends Controller
{
    public function index()
    {
        return view('master.settings.bindings.index');
    }

    public function create()
    {
        //
    }

    public function store(StoreBindingRequest $request)
    {
        //
    }

    public function show(Binding $binding)
    {
        //
    }

    public function edit(Binding $binding)
    {
        //
    }

    public function update(UpdateBindingRequest $request, Binding $binding)
    {
        //
    }

    public function destroy(Binding $binding)
    {
        //
    }
}
