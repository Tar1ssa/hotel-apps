<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// get(melihat/read)
// post(insert/create use form)
// put(update use form)
// delete(use form)

Route::get('belajar', [\App\Http\Controllers\BelajarController::class, 'index']);


Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);

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
