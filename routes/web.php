<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BindingController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ScriptController;

use App\Http\Controllers\UserController;
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
    return redirect('login');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('/students', UserController::class);
    Route::resource('/books', BookController::class);
    Route::resource('/authors', AuthorController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/genres', GenreController::class);
    Route::resource('/publishers', PublisherController::class);
    Route::resource('/bindings', BindingController::class);
    Route::resource('/sizes', SizeController::class);
    Route::resource('/scripts', ScriptController::class);
    Route::resource('/librarians', LibrarianController::class);


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/policy', [HomeController::class, 'policy'])->name('policy');

});


require __DIR__ . '/auth.php';
