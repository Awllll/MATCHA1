<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController; // <--- INI WAJIB DITAMBAHKAN
use App\Http\Controllers\ToppingController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\JenisSusuController;
use App\Http\Controllers\KepekatanMatchaController;
use App\Http\Controllers\TingkatKemanisanController;
use App\Http\Controllers\EsBatuController;
use App\Models\Produk;

// ====================================================
// 1. HALAMAN PUBLIK (Landing Page)
// ====================================================
Route::get('/', function () {
    try {
        $produk = Produk::all();
    } catch (\Exception $e) {
        $produk = [];
    }
    return view('welcome', compact('produk'));
});

// ====================================================
// 2. HALAMAN LOGIN
// ====================================================
Route::get('/login', [AuthController::class, 'loginAdmin'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ====================================================
// 3. HALAMAN ADMIN & KARYAWAN
// ====================================================
Route::middleware(['auth'])->group(function () {

    // --- AREA ADMIN ---
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/transaksi/detail', function () {
        return view('admin.transaksi.detail');
    })->name('admin.transaksi.detail');

    Route::resource('admin/users', UserController::class)->names('admin.users');
    Route::resource('admin/produk', ProdukController::class)->names('admin.produk');
    Route::resource('admin/kategori', KategoriController::class)->names('admin.kategori');
    Route::resource('admin/topping', ToppingController::class)->names('admin.topping');
    Route::resource('admin/ukuran', UkuranController::class)->names('admin.ukuran');
    Route::resource('admin/jenis-susu', JenisSusuController::class)->names('admin.jenis_susu');
    Route::resource('admin/kepekatan', KepekatanMatchaController::class)->names('admin.kepekatan');
    Route::resource('admin/tingkat-kemanisan', TingkatKemanisanController::class)->names('admin.tingkat_kemanisan');
    Route::resource('admin/es-batu', EsBatuController::class)->names('admin.es_batu');

    // --- AREA KARYAWAN ---

    Route::get('/karyawan/dashboard', function () {
        return "Halo Karyawan! <form action='".route('logout')."' method='POST'><input type='hidden' name='_token' value='".csrf_token()."'><button type='submit'>Logout</button></form>";
    })->name('karyawan.dashboard');

});
