<?php

use App\Models\guests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestsController;
use Illuminate\Routing\Route as RoutingRoute;

Route::get('/', function () {
    return view('welcome');
});


// get(melihat/read)
// post(insert/create use form)
// put(update use form)
// delete(use form)

Route::get('belajar', [\App\Http\Controllers\BelajarController::class, 'index']);


Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
Route::resource('user', \App\Http\Controllers\UserController::class);
Route::resource('categories', \App\Http\Controllers\CategoriesController::class);
Route::resource('rooms', \App\Http\Controllers\RoomsController::class);
Route::resource('guests', \App\Http\Controllers\GuestsController::class);
Route::resource('reservation', \App\Http\Controllers\ReservationController::class);
Route::get('get-room-by-category/{id}', [\App\Http\Controllers\ReservationController::class, 'getRoomByCategory'])->name('get-room-by-category');

// Route::get('guests', [GuestsController::class, 'index'])->name('guests');

Route::get("panggil", [\App\Http\Controllers\BelajarController::class, 'getCallName']);
Route::get("tambah", [\App\Http\Controllers\BelajarController::class, 'tambah'])->name('tambah');
Route::post('hasil_tambah', [\App\Http\Controllers\BelajarController::class, 'hasil_tambah'])->name('hasil_tambah');

Route::get("kurang", [\App\Http\Controllers\BelajarController::class, 'kurang'])->name('kurang');
Route::post('hasil_kurang', [\App\Http\Controllers\BelajarController::class, 'hasil_kurang'])->name('hasil_kurang');

Route::get("bagi", [\App\Http\Controllers\BelajarController::class, 'bagi'])->name('bagi');
Route::post('hasil_bagi', [\App\Http\Controllers\BelajarController::class, 'hasil_bagi'])->name('hasil_bagi');

Route::get("kali", [\App\Http\Controllers\BelajarController::class, 'kali'])->name('kali');
Route::post('hasil_kali', [\App\Http\Controllers\BelajarController::class, 'hasil_kali'])->name('hasil_kali');

Route::get("login", [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post("login-action", [\App\Http\Controllers\LoginController::class, 'loginAction'])->name('login-action');



Route::get('tambah2', function () {
    return view('tambah');
});
