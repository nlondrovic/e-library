<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('name', 'asc')->paginate(5);
        return view('settings.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('settings.genres.create');
    }

    public function store(StoreGenreRequest $request)
    {
        $inputs = $request->validated();
        Genre::create($inputs);
        return redirect()->route('genres.index');
    }

    public function edit(Genre $genre)
    {
        return view('settings.genres.edit', compact('genre'));
    }

    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $inputs = $request->validated();
        $genre->update($inputs);
        return redirect()->route('genres.index');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index');
    }
}
