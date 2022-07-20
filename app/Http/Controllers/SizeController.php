<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;

class SizeController extends Controller
{
    public function index()
    {
        return view('master.settings.sizes.index');
    }

    public function create()
    {
        //
    }

    public function store(StoreSizeRequest $request)
    {
        //
    }

    public function show(Size $size)
    {
        //
    }

    public function edit(Size $size)
    {
        //
    }

    public function update(UpdateSizeRequest $request, Size $size)
    {
        //
    }

    public function destroy(Size $size)
    {
        //
    }
}
