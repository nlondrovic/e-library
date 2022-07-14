<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    public function index()
    {
        return view('master.books.index', ['books' => Book::all()]);
    }

    public function create()
    {
        return view('master.books.create', ['authors' => Author::all()]);
    }

    public function store(StoreBookRequest $request)
    {
        $inputs = $request->validated();
        Book::create($inputs);
        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('master.books.show', $book);
    }

    public function edit(Book $book)
    {
        return view('master.books.edit', $book);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    public function destroy($book)
    {
        Book::query()->findOrFail($book)->delete();
        return redirect()->route('books.index');
    }
}
