<?php

use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return view('reservations.welcome');
})->middleware(['auth'])->name('reservations.welcome');

Route::resource('reservations', ReservationController::class)->middleware('auth');
Route::get('destroy/{id}', [ReservationController::class, 'destroy'])->middleware('auth');
Route::get('search', [ReservationController::class, 'search'])->middleware('auth');

Route::get('contact', [ReservationController::class, 'contact'])->middleware('auth');

require __DIR__.'/auth.php';
