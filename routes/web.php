<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VolController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/vols', [VolController::class, 'index']);
Route::get('/reservations/reserver-step-one', [ReservationController::class, 'reserverStepOne'])->name('reservations.step.one');
Route::get('/reservations/reserver-step-two', [ReservationController::class, 'reserverStepTwo'])->name('reservations.step.two');
Route::post('/reservations/reserver-step-one', [ReservationController::class, 'reserverStepOnePost'])->name('reservations.step.one.post');
Route::post('/reservations/reserver-step-two', [ReservationController::class, 'reserverStepTwoPost'])->name('reservations.step.two.post');
Route::post('/reservations/reserver-step-three', [ReservationController::class, 'reserverStepThree'])->name('reservations.step.three');
Route::post('/reservations/prix', [ReservationController::class, 'getPrix'])->name('reservations.step.two.prix');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
