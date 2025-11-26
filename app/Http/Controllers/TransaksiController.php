<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\DetailTransaksiTopping;
use App\Models\Produk;
use App\Models\Topping;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    // Form checkout (input nama pembeli)
    public function checkoutForm()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) return redirect()->back()->with('error','Keranjang kosong!');

        $total = 0;
        foreach($cart as $item) $total += ($item['harga'] ?? 0) * ($item['qty'] ?? 1);

        return view('karyawan.transaksi.checkout', compact('cart','total'));
    }

    // Konfirmasi nama pembeli → pilih metode pembayaran
    public function confirmPayment(Request $request)
    {
        $request->validate(['nama_pembeli' => 'required|string|max:100']);

        $cart = session()->get('cart', []);
        if(empty($cart)) return redirect()->back()->with('error','Keranjang kosong!');

        session(['checkout_data' => ['nama_pembeli' => $request->nama_pembeli]]);

        $total = 0;
        foreach($cart as $item) $total += ($item['harga'] ?? 0) * ($item['qty'] ?? 1);

        return view('karyawan.transaksi.metode_pembayaran', compact('cart','total'));
    }

    // Proses checkout → simpan transaksi
    public function checkout(Request $request)
    {
        $request->validate(['metode_pembayaran_id' => 'required|exists:metode_pembayaran,id']);
        $cart = session()->get('cart', []);
        $checkoutData = session('checkout_data', []);

        if(empty($cart) || empty($checkoutData))
            return redirect()->route('kasir.checkout.form')->with('error','Keranjang atau data pembeli kosong!');

        $totalHarga = 0;
        foreach($cart as $item) $totalHarga += ($item['harga'] ?? 0) * ($item['qty'] ?? 1);

        DB::transaction(function() use($request, $cart, $totalHarga, $checkoutData){
            $transaksi = Transaksi::create([
                'pengguna_id' => auth()->id(),
                'metode_pembayaran_id' => $request->metode_pembayaran_id,
                'nama_pembeli' => $checkoutData['nama_pembeli'],
                'total_harga' => $totalHarga,
            ]);

            foreach($cart as $item){
                $produkId = $item['id'] ?? null;
                $detail = DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $produkId,
                    'jumlah' => $item['qty'] ?? 1,
                    'harga_saat_transaksi' => $item['harga'] ?? 0,
                    'ukuran_id' => $item['ukuran_id'] ?? null,
                    'kemanisan_id' => $item['kemanisan_id'] ?? null,
                ]);

                // Kurangi stok produk
                if($produkId){
                    $produk = Produk::find($produkId);
                    if($produk){
                        $produk->stok -= ($item['qty'] ?? 1);
                        $produk->save();
                    }
                }

                // Simpan topping
                if(!empty($item['topping_id'])){
                    foreach($item['topping_id'] as $tid){
                        DetailTransaksiTopping::create([
                            'detail_transaksi_id' => $detail->id,
                            'topping_id' => $tid,
                            'harga_topping_saat_transaksi' => 0
                        ]);

                        $topping = Topping::find($tid);
                        if($topping){
                            $topping->stok -= ($item['qty'] ?? 1);
                            $topping->save();
                        }
                    }
                }
            }
        });

        session()->forget(['cart','checkout_data']);
        return redirect()->route('karyawan.dashboard')->with('success','Transaksi berhasil disimpan!');
    }
}
