<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Author;
use App\Models\Binding;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Script;
use App\Models\Size;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(5);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $genres = Genre::all();
        $publishers = Publisher::all();
        $scripts = Script::all();
        $sizes = Size::all();
        $bindings = Binding::all();

        return view('books.create',
            compact('authors', 'categories', 'genres', 'publishers', 'scripts', 'sizes', 'bindings')
        );
    }

    public function store(StoreBookRequest $request)
    {
        $inputs = $request->validated();

        if ($request['picture']) {
            $file = $request['picture'];
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = "/images/books/" . Str::slug(time() . " " . $filename) . ".{$file->getClientOriginalExtension()}";
            $inputs['picture'] = $filename;
            $file->move(public_path('/images/books/'), $filename);
        }
        else
            $inputs['picture'] = Book::DEFAULT_BOOK_PICTURE_PATH;

        Book::create($inputs);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        $activities = Activity::where('book_id', $book->id)->orderBy('id', 'desc')->take(5)->get();
        return view('books.show', compact('book', 'activities'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        $genres = Genre::all();
        $publishers = Publisher::all();
        $scripts = Script::all();
        $sizes = Size::all();
        $bindings = Binding::all();

        return view('books.edit',
            compact('book', 'authors', 'categories', 'genres', 'publishers', 'scripts', 'sizes', 'bindings')
        );
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $inputs = $request->validated();

        if ($request['picture']) {
            $file = $request['picture'];
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = "/images/books/" . Str::slug(time() . " " . $filename) . ".{$file->getClientOriginalExtension()}";
            $inputs['picture'] = $filename;
            $file->move(public_path('/images/books/'), $filename);
        }
        else
            $inputs['picture'] = Book::DEFAULT_BOOK_PICTURE_PATH;

        $book->update($inputs);

        return redirect()->route('books.show', compact('book'));
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
