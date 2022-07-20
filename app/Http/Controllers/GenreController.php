<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;

class GenreController extends Controller
{
    public function index()
    {
        return view('master.settings.genres.index');
    }

    public function create()
    {
        //
    }

    public function store(StoreGenreRequest $request)
    {
        //
    }

    public function show(Genre $genre)
    {
        //
    }

    public function edit(Genre $genre)
    {
        //
    }

    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        //
    }

    public function destroy(Genre $genre)
    {
        //
    }
}
