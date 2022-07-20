<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;

class PublisherController extends Controller
{
    public function index()
    {
        return view('master.settings.publishers.index');
    }

    public function create()
    {
        //
    }


    public function store(StorePublisherRequest $request)
    {
        //
    }

    public function show(Publisher $publisher)
    {
        //
    }

    public function edit(Publisher $publisher)
    {
        //
    }

    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        //
    }

    public function destroy(Publisher $publisher)
    {
        //
    }
}
