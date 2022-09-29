<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $search_array = Author::orderBy('name', 'asc')->get();

        if ($request->get('search')) {
            $authors = Author::where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orderBy('name', 'asc')->get();

            return view('authors.index', compact('authors', 'search_array'));
        }

        $authors = Author::orderBy('name', 'asc')->paginate(8);
        $pagination = true;

        return view('authors.index', compact('authors', 'search_array', 'pagination'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(StoreAuthorRequest $request)
    {
        $inputs = $request->validated();

        if ($request['picture']) {
            $file = $request['picture'];
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = "/images/authors/" . Str::slug(time() . " " . $filename) . ".{$file->getClientOriginalExtension()}";
            $inputs['picture'] = $filename;
            $file->move(public_path('/images/authors/'), $filename);
        } else {
            $inputs['picture'] = User::DEFAULT_USER_PICTURE_PATH;
        }

        Author::create($inputs);
        return redirect()->route('authors.index')->with('flash-success', __('Author created successfully!'));
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $inputs = $request->validated();

        if ($request['picture']) {
            $file = $request['picture'];
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = "/images/authors/" . Str::slug(time() . " " . $filename) . ".{$file->getClientOriginalExtension()}";
            $inputs['picture'] = $filename;
            $file->move(public_path('/images/authors/'), $filename);
        } else {
            $inputs['picture'] = User::DEFAULT_USER_PICTURE_PATH;
        }

        $author->update($inputs);
        return redirect()->route('authors.index')->with('flash-success', __('Author updated successfully!'));
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('flash-success', __('Author deleted successfully!'));
    }
}
