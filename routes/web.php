<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KalkulatorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransOrderController;

Route::get('/', [LoginController::class, 'index']);
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//grouping routine
Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class); //supaya dapat otomatis crud
    Route::resource('service', ServiceController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('trans_order', TransOrderController::class);
});

Route::get('latihan', [LatihanController::class, 'index']);
Route::get('edit/{id}', [LatihanController::class, 'edit']); //->name('edit'); jika di halaman menjadi 404 not found
Route::get('hapus/{id}', [LatihanController::class, 'delete']);

Route::get('kalkulator', [KalkulatorController::class, 'index']);
Route::get('tambah', [KalkulatorController::class, 'tambah'])->name('tambah');
Route::get('kurang', [KalkulatorController::class, 'kurang'])->name('kurang');
Route::get('bagi', [KalkulatorController::class, 'bagi'])->name('bagi');
Route::get('kali', [KalkulatorController::class, 'kali'])->name('kali');

Route::post('store-tambah', [KalkulatorController::class, 'storeTambah'])->name('store-tambah');
Route::post('store-kurang', [KalkulatorController::class, 'storeKurang'])->name('store-kurang');
Route::post('store-bagi', [KalkulatorController::class, 'storeBagi'])->name('store-bagi');
Route::post('store-kali', [KalkulatorController::class, 'storeKali'])->name('store-kali');

Route::resource('user', UsersController::class);
