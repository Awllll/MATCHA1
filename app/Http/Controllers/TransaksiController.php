<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\DetailTransaksiTopping;
use App\Models\Produk;
use App\Models\Topping;
use App\Models\Pengguna;
use App\Models\Kategori;
use App\Models\MetodePembayaran;
use App\Models\TingkatKemanisan;
use App\Models\Ukuran;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function checkoutForm()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) return redirect()->back()->with('error','Keranjang kosong!');

        $total = 0;
        foreach($cart as $item) $total += ($item['harga'] ?? 0) * ($item['qty'] ?? 1);

        return view('karyawan.transaksi.checkout', compact('cart','total'));
    }

    public function confirmPayment(Request $request)
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) {
            return redirect()->route('kasir.checkout.form')->with('error', 'Keranjang kosong!');
        }

        $request->validate(['nama_pembeli' => 'required|string|max:100']);

        session(['checkout_data' => ['nama_pembeli' => $request->nama_pembeli]]);

        return redirect()->route('kasir.checkout.metode');
    }

    public function metodePembayaran()
    {
        $cart = session()->get('cart', []);
        $checkoutData = session('checkout_data', []);
        if(empty($cart) || empty($checkoutData))
            return redirect()->route('kasir.checkout.form')->with('error','Keranjang atau data pembeli kosong!');

        $total = 0;
        foreach($cart as $item) $total += ($item['harga'] ?? 0) * ($item['qty'] ?? 1);
        $metode = DB::table('metode_pembayaran')->get();
        return view('karyawan.transaksi.metode_pembayaran', compact('cart','total', 'metode'));
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        $checkoutData = session('checkout_data', []);
        if(empty($cart) || empty($checkoutData)) {
            return redirect()->route('kasir.checkout.form')
                            ->with('error','Keranjang atau data pembeli kosong!');
        }

        $request->validate(['metode_pembayaran_id' => 'required|exists:metode_pembayaran,id']);

        $totalHarga = 0;
        foreach($cart as $item) $totalHarga += ($item['harga'] ?? 0) * ($item['qty'] ?? 1);

        $transaksi = null;

        DB::transaction(function() use($request, $cart, $totalHarga, $checkoutData, &$transaksi) {
            $transaksi = Transaksi::create([
                'pengguna_id' => auth()->id(),
                'metode_pembayaran_id' => $request->metode_pembayaran_id,
                'nama_pembeli' => $checkoutData['nama_pembeli'],
                'total_harga' => $totalHarga,
            ]);

            foreach($cart as $item){
                $produkId = $item['id'] ?? null;
                $detailData = [
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $produkId,
                    'jumlah' => $item['qty'] ?? 1,
                    'harga_saat_transaksi' => $item['harga'] ?? 0,
                ];

                if(!empty($item['ukuran_id'])) {
                    $detailData['ukuran_id'] = $item['ukuran_id'];
                }

                if(!empty($item['kemanisan_id'])) {
                    $detailData['kemanisan_id'] = $item['kemanisan_id'];
                }

                $detail = DetailTransaksi::create($detailData);

                if($produkId){
                    $produk = Produk::find($produkId);
                    if($produk){
                        $produk->stok -= ($item['qty'] ?? 1);
                        $produk->save();
                    }
                }

                if(!empty($item['topping_id'])){
                    foreach($item['topping_id'] as $tid){
                        $topping = Topping::find($tid);
                        
                        DetailTransaksiTopping::create([
                            'detail_transaksi_id' => $detail->id,
                            'topping_id' => $tid,
                            'harga_topping_saat_transaksi' => $topping ? $topping->harga : 0
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
        return redirect()->route('kasir.transaksi.struk', $transaksi->id)->with('success','Transaksi berhasil disimpan!');
    }

    public function struk($id)
    {
        $transaksi = Transaksi::with([
            'metodePembayaran',
            'pengguna',
            'detailTransaksi.produk',
            'detailTransaksi.ukuran',
            'detailTransaksi.kemanisan',
            'detailTransaksi.topping'
        ])->findOrFail($id);

        return view('karyawan.transaksi.struk', compact('transaksi'));
    }
}
