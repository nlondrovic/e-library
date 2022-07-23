<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();

        return view('master.settings.publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('master.settings.publishers.create');
    }

    public function store(StorePublisherRequest $request)
    {
        $inputs = $request->validated();

        Publisher::create($inputs);

        return redirect()->route('publishers.index');
    }

    public function edit(Publisher $publisher)
    {
        return view('master.settings.publishers.edit', compact('publisher'));
    }

    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $inputs = $request->validated();

        $publisher->update($inputs);

        return redirect()->route('publishers.index', compact('publisher'));
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect()->route("publishers.index");
    }
}
