<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Ukuran;
use App\Models\TingkatKemanisan;
use App\Models\Topping;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    public function dashboard()
    {
        // Ambil semua produk untuk ditampilkan di menu
        $produks = Produk::with('kategori')->get();
        $pengguna = Auth::user();

        return view('karyawan.dashboard', compact('produks', 'pengguna'));
    }

    public function makanan()
    {
        $makanan = Produk::whereHas('kategori', function($q) {
            $q->where('nama', 'makanan');
        })->get();

        return view('karyawan.menu.makanan', [
            'title' => 'Menu Makanan',
            'menus' => $makanan
        ]);
    }

    public function minuman()
    {
        $minuman = Produk::whereHas('kategori', function($q) {
            $q->where('nama', 'minuman');
        })->get();

        return view('karyawan.menu.minuman', [
            'title' => 'Menu Minuman',
            'menus' => $minuman
        ]);
    }

    public function addToCart(Request $request, Produk $produk)
    {
        $cart = session()->get('cart', []);

        $itemId = $produk->id;

        $cart[$itemId] = [
            'produk_id' => $produk->id,
            'nama'      => $produk->nama,
            'harga'     => $produk->harga,
            'qty'       => $request->qty ?? 1,
            'ukuran'    => $request->ukuran ?? null,
            'kemanisan' => $request->kemanisan ?? null,
            'topping'   => $request->topping ?? [],
        ];

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Menu ditambahkan ke keranjang');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('karyawan.transaksi.cart', compact('cart'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            unset($cart[$id]);
            session(['cart' => $cart]);
        }
        return redirect()->back()->with('success', 'Item dihapus dari keranjang');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if(empty($cart)){
            return redirect()->back()->with('error', 'Keranjang kosong');
        }

        // Simpan ke database transaksi & detail transaksi
        // (kode insert ke transaksi, detail_transaksi, detail_transaksi_topping nanti)
        session()->forget('cart');

        return redirect()->route('karyawan.dashboard')->with('success', 'Transaksi berhasil');
    }

}
