<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ToppingController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\TingkatKemanisanController;
use App\Http\Controllers\KasirController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login-admin', [AuthController::class, 'loginAdmin'])->name('login.admin');
Route::get('/login-karyawan', [AuthController::class, 'loginKaryawan'])->name('login.karyawan');
// PROSES LOGIN
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

// LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// DASHBOARD ADMIN
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// DASHBOARD KARYAWAN
Route::get('/karyawan/dashboard', [KasirController::class, 'dashboard'])->name('karyawan.dashboard');
Route::get('/karyawan/menu/makanan', [KasirController::class, 'makanan'])->name('menu.makanan');
Route::get('/karyawan/menu/minuman', [KasirController::class, 'minuman'])->name('menu.minuman');



Route::resource('pengguna', PenggunaController::class);
Route::resource('produk', ProdukController::class);
Route::resource('topping', ToppingController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('ukuran', UkuranController::class);
Route::resource('tingkatkemanisan', TingkatKemanisanController::class);
