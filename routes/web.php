<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_login;
use App\Http\Controllers\c_sampah;
use App\Http\Controllers\c_kalkulator;
use App\Http\Controllers\c_riwayat;

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



Route::get('error', [App\Http\Controllers\c_login::class, 'errorPage'])->name('error');
Route::get('/', [App\Http\Controllers\c_login::class, 'landingPage'])->name('user.login');
// Login Logout
Route::get('/auth', [App\Http\Controllers\c_login::class, 'index']);
Route::get('/dashboard', [App\Http\Controllers\c_login::class, 'dashboard'] )->name('dashboard');
Route::post('/check', [App\Http\Controllers\c_login::class, 'check'])->name('login.check');
Route::post('/', [App\Http\Controllers\c_login::class, 'logout'])->name('user.logout');

Route::get('profil/chartsampah', [App\Http\Controllers\c_login::class, 'chartSampah'])->name('profil.chartsampah');
Route::get('hari', [App\Http\Controllers\c_login::class, 'hari'] )->name('hari');

// Barang
Route::controller(c_sampah::class)->group(function () {
    Route::get('sampah', 'index')->name('sampah.index');
    Route::get('sampah/create', 'create')->name('sampah.create');
    Route::post('sampah/store', 'store')->name('sampah.store');
    Route::get('sampah/detail/{id}', 'detail')->name('sampah.detail');
});

// Kalkulator
Route::controller(c_kalkulator::class)->group(function () {
    Route::get('kalkulator', 'index')->name('kalkulator.index');
    // js
    Route::get('modal/{id_sampah}', 'tampilModal')->name('tampil.modal');
    Route::get('simpan', 'simpanPerhitungan')->name('tampil.simpan');
});

// Riwayat
Route::controller(c_riwayat::class)->group(function () {
    Route::get('riwayat', 'index')->name('riwayat.index');
  
});




