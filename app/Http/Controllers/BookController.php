<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('master.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('master.books.create', compact('authors'));
    }

    public function store(StoreBookRequest $request)
    {
        $inputs = $request->validated();
        Book::create($inputs);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('master.books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('master.books.edit', compact('book', 'authors'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $inputs = $request->validated();
        $book->update($inputs);

        return redirect()->route('books.show', compact('book'));
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
