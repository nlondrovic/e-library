<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/books', BookController::class);
Route::resource('/authors', AuthorController::class);

//
//Route::get('/books/index', [BookController::class, 'index'])->name('books_index');
//Route::get('/books/show', [BookController::class, 'show'])->name('books_show');
//Route::get('/books/create', [BookController::class, 'create'])->name('books_create');
//Route::post('/books/store', [BookController::class, 'store'])->name('books_store');
//Route::get('/books/edit', [BookController::class, 'edit'])->name('books_edit');
//Route::patch('/books/update', [BookController::class, 'update'])->name('books_update');
//Route::delete('/books/destroy', [BookController::class, 'destroy'])->name('books_destroy');
//
//
//Route::get('/authors/index', [AuthorController::class, 'index'])->name('authors_index');
//Route::get('/authors/show/{id}', [AuthorController::class, 'show'])->name('authors_show');
//Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors_create');
//Route::post('/authors/store', [AuthorController::class, 'store'])->name('authors_store');
//Route::get('/authors/edit', [AuthorController::class, 'edit'])->name('authors_edit');
//Route::patch('/authors/update', [AuthorController::class, 'update'])->name('authors_update');
//Route::delete('/authors/destroy', [AuthorController::class, 'destroy'])->name('authors_destroy');
//
