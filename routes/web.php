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
    Route::get('/policy', [HomeController::class, 'policy'])->name('policy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    // RESERVATIONS LISTING

    Route::get('/transactions/activeReservations', [ReservationController::class, 'activeReservations'])->name('reservations.active');
    Route::get('/transactions/archivedReservations', [ReservationController::class, 'archivedReservations'])->name('reservations.archived');
//    Route::get('/transactions/pendingReservations', [ReservationController::class, 'pendingReservations'])->name('reservations.pending');

    // RESERVATIONS CREATE, STORE, SHOW, CHECKOUT, CANCEL

    Route::get('/transactions/createReservation', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/transactions/storeReservation', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/transactions/showReservation', [ReservationController::class, 'show'])->name('reservations.show');
    Route::patch('/transactions/checkOutReservation/{reservation}', [ReservationController::class, 'checkOut'])->name('reservations.checkOut');
    Route::patch('/transactions/cancelReservation/{reservation}', [ReservationController::class, 'cancel'])->name('reservations.cancel');
//    Route::patch('/transactions/denyReservation/{reservation}', [ReservationController::class, 'deny'])->name('reservations.deny');
//    Route::patch('/transactions/acceptReservation/{reservation}', [ReservationController::class, 'accept'])->name('reservations.accept');



    // CHECKOUTS LISTING

    Route::get('/transactions/checkouts', [CheckoutController::class, 'checkouts'])->name('checkouts.index');
    Route::get('/transactions/checkins', [CheckoutController::class, 'checkins'])->name('checkins.index');
    Route::get('/transactions/overdues', [CheckoutController::class, 'overdues'])->name('overdues.index');

    // CHECKOUTS CREATE, STORE, SHOW, DELETE, WRITE OFF

    Route::get('/transactions/checkouts/create/{book}', [CheckoutController::class, 'create'])->name('checkouts.create');
    Route::post('/transactions/checkouts/store', [CheckoutController::class, 'store'])->name('checkouts.store');
    Route::get('/transactions/checkouts/{checkout}', [CheckoutController::class, 'show'])->name('checkouts.show');
    Route::get('/transactions/checkins/{checkout}', [CheckoutController::class, 'show'])->name('checkins.show');
    Route::post('/transactions/checkin/{checkout}', [CheckoutController::class, 'checkIn'])->name('checkIn');
    Route::post('/transactions/writeOff/{checkout}', [CheckoutController::class, 'writeOff'])->name('writeOff');
    Route::delete('/transactions/checkin/delete/{checkout}', [CheckoutController::class, 'deleteCheckin'])->name('checkins.delete');

});


require __DIR__ . '/auth.php';
