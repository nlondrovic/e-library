<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('name', 'asc')->paginate(8);
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
        return redirect()->route('genres.index')->with('flash-success', __('Genre created successfully!'));
    }

    public function edit(Genre $genre)
    {
        return view('settings.genres.edit', compact('genre'));
    }

    public function show()
    {
        return view('errors.404');
    }

    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $inputs = $request->validated();
        $genre->update($inputs);
        return redirect()->route('genres.index')->with('flash-success', __('Genre updated successfully!'));
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('flash-success', __('Genre deleted successfully!'));
    }
}
