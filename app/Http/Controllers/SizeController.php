<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::orderBy('name', 'asc')->paginate(8);
        return view('settings.sizes.index', compact('sizes'))->with('flash-success', __('Size created successfully!'));
    }

    public function create()
    {
        return view('settings.sizes.create');
    }

    public function store(StoreSizeRequest $request)
    {
        Size::create($request->validated());

        return redirect()->route('sizes.index');
    }

    public function edit(Size $size)
    {
        return view('settings.sizes.edit', compact('size'));
    }

    public function update(UpdateSizeRequest $request, Size $size)
    {
        $size->update($request->validated());
        return redirect()->route('sizes.index')->with('flash-success', __('Size updated successfully!'));
    }

    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->route('sizes.index')->with('flash-success', __('Size deleted successfully!'));
    }
}
