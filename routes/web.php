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
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login-admin', [AuthController::class, 'loginAdmin'])->name('login.admin');
Route::get('/login-karyawan', [AuthController::class, 'loginKaryawan'])->name('login.karyawan');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');})->name('admin.dashboard');


// Form personalisasi minuman
Route::get('kasir/personalisasi/{id}', [KasirController::class, 'personalisasiForm'])->name('kasir.personalisasi.form');

// Tambah ke cart (makanan biasa & minuman personalisasi)
Route::post('kasir/add-to-cart/{id}', [KasirController::class, 'addToCart'])->name('kasir.addToCart');


Route::get('/karyawan/dashboard', [KasirController::class,'dashboard'])->name('karyawan.dashboard');
Route::get('/karyawan/menu/makanan', [KasirController::class,'makanan'])->name('menu.makanan');
Route::get('/karyawan/menu/minuman', [KasirController::class,'minuman'])->name('menu.minuman');

Route::get('kasir/cart/plus/{key}', [KasirController::class,'cartPlus'])->name('kasir.qty.plus');
Route::get('kasir/cart/minus/{key}', [KasirController::class,'cartMinus'])->name('kasir.qty.minus');

Route::get('kasir/checkout/form', [TransaksiController::class,'checkoutForm'])->name('kasir.checkout.form');
Route::post('kasir/checkout/confirm', [TransaksiController::class,'confirmPayment'])->name('kasir.checkout.confirm');
Route::post('kasir/checkout', [TransaksiController::class,'checkout'])->name('kasir.checkout');

Route::get('transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi.index');
Route::get('transaksi/{id}', [TransaksiController::class, 'show'])->name('admin.transaksi.show');
Route::delete('transaksi/{id}', [TransaksiController::class, 'destroy'])->name('admin.transaksi.destroy');

Route::resource('pengguna', PenggunaController::class);
Route::resource('produk', ProdukController::class);
Route::resource('topping', ToppingController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('ukuran', UkuranController::class);
Route::resource('tingkatkemanisan', TingkatKemanisanController::class);
