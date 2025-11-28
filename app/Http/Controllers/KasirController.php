<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Ukuran;
use App\Models\TingkatKemanisan;
use App\Models\Topping;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    public function dashboard()
    {
        $produks = Produk::with('kategori')->get();
        $pengguna = Auth::user();
        return view('karyawan.dashboard', compact('produks', 'pengguna'));
    }

    public function makanan()
    {
        $makanan = Produk::whereHas('kategori', fn($q) => $q->where('nama', 'makanan'))->get();
        return view('karyawan.menu.makanan', ['title' => 'Menu Makanan', 'menus' => $makanan]);
    }

    public function minuman()
    {
        $minuman = Produk::whereHas('kategori', fn($q) => $q->where('nama', 'minuman'))->get();
        return view('karyawan.menu.minuman', ['title' => 'Menu Minuman', 'menus' => $minuman]);
    }

    public function personalisasiForm($id)
    {
        $produk = Produk::findOrFail($id);
        $ukuran = Ukuran::all();
        $kemanisan = TingkatKemanisan::all();
        $topping = Topping::all();

        return view('karyawan.personalisasi.form', compact('produk','ukuran','kemanisan','topping'));
    }

    public function addToCart(Request $request, $id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        $cart = session()->get('cart', []);

        if(strtolower($produk->kategori->nama) != 'minuman' || !$request->has('ukuran_id')){
            $found = false;

            foreach($cart as $key => $item){
                if($item['id'] == $produk->id && $item['tipe'] == 'biasa'){
                    $cart[$key]['qty']++;
                    $found = true;
                    break;
                }
            }

            if(!$found){
                $cart[] = [
                    'id' => $produk->id,
                    'nama' => $produk->nama,
                    'harga' => $produk->harga,
                    'qty' => 1,
                    'tipe' => 'biasa',
                ];
            }

            session()->put('cart', $cart);
            return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
        }

        $ukuran = Ukuran::find($request->ukuran_id);
        $kemanisan = TingkatKemanisan::find($request->kemanisan_id);
        $topping_ids = $request->topping ?? [];
        $topping = Topping::whereIn('id', $topping_ids)->get();

        $total = $produk->harga + ($ukuran->harga_tambahan ?? 0);
        foreach($topping as $top) $total += $top->harga;

        $found = false;
        foreach($cart as $key => $item){
            if(
                $item['id'] == $produk->id &&
                $item['tipe'] == 'personalisasi' &&
                $item['ukuran_id'] == $ukuran->id &&
                $item['kemanisan_id'] == $kemanisan->id &&
                $item['topping_id'] == $topping_ids
            ){
                $cart[$key]['qty']++;
                $found = true;
                break;
            }
        }

        if(!$found){
            $cart[] = [
                'id' => $produk->id,
                'nama' => $produk->nama,
                'tipe' => 'personalisasi',
                'harga' => $total,
                'qty' => 1,
                'ukuran_id' => $ukuran->id ?? null,
                'kemanisan_id' => $kemanisan->id ?? null,
                'topping_id' => $topping_ids,
                'ukuran' => $ukuran->nama ?? null,
                'kemanisan' => $kemanisan->nama ?? null,
                'topping' => $topping->pluck('nama')->toArray(),
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Minuman berhasil ditambahkan ke keranjang dengan personalisasi!');
    }

    public function cartPlus($key)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$key])) $cart[$key]['qty']++;
        session()->put('cart', $cart);
        return back();
    }

    public function cartMinus($key)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$key])){
            $cart[$key]['qty']--;
            if($cart[$key]['qty'] <= 0) unset($cart[$key]);
        }
        session()->put('cart', $cart);
        return back();
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach($cart as $item) $total += ($item['harga'] ?? 0) * ($item['qty'] ?? 1);
        return view('karyawan.transaksi.cart', compact('cart', 'total'));
    }
}
