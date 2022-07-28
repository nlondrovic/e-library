<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BindingController;
use App\Http\Controllers\ReservationController;
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

    // DASHBOARD

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


//    BASIC CRUDs

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


    Route::resource('/reservations', ReservationController::class);
//        Route::get('/reservations/{book}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/policy', [HomeController::class, 'policy'])->name('policy');


    // CHECKOUTS LISTING

    Route::get('/transactions/checkouts', [CheckoutController::class, 'checkouts'])->name('checkouts.index');
    Route::get('/transactions/checkins', [CheckoutController::class, 'checkins'])->name('checkins.index');
    Route::get('/transactions/overdues', [CheckoutController::class, 'overdues'])->name('overdues.index');

    // CHECKOUTS SHOW

    Route::get('/transactions/checkouts/{checkout}', [CheckoutController::class, 'checkout'])->name('checkouts.show');
    Route::get('/transactions/checkins/{checkout}', [CheckoutController::class, 'checkout'])->name('checkins.show');

    // CHECKOUTS CREATE, STORE, DELETE, WRITE OFF

    Route::get('/transactions/checkouts/create/{book}', [CheckoutController::class, 'create'])->name('checkouts.create');
    Route::post('/transactions/checkouts/store', [CheckoutController::class, 'store'])->name('checkouts.store');
    Route::post('/transactions/checkin/{checkout}', [CheckoutController::class, 'checkIn'])->name('checkIn');
    Route::post('/transactions/writeOff/{checkout}', [CheckoutController::class, 'writeOff'])->name('writeOff');
    Route::delete('/transactions/checkin/delete/{checkout}', [CheckoutController::class, 'deleteCheckin'])->name('checkins.delete');


});


require __DIR__ . '/auth.php';
