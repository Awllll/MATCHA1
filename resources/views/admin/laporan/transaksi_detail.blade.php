@extends('admin.layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Transaksi</h1>

    <div class="mb-3">
        <strong>Nama Pembeli:</strong> {{ $transaksi->nama_pembeli }} <br>
        <strong>Kasir:</strong> {{ $transaksi->pengguna->nama ?? 'N/A' }} <br>
        <strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }} <br>
        <strong>Metode Pembayaran:</strong> {{ $transaksi->metodePembayaran->nama ?? 'N/A' }} <br>
        <strong>Tanggal:</strong> {{ $transaksi->created_at->format('d-m-Y H:i') }}
    </div>

    <h4>Daftar Produk</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Ukuran</th>
                <th>Kemanisan</th>
                <th>Qty</th>
                <th>Harga Satuan</th>
                <th>Total</th>
                <th>Topping</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi->detailTransaksi as $detail)
                <tr>
                    <td>{{ $detail->produk->nama ?? '-' }}</td>
                    <td>{{ $detail->ukuran->nama ?? '-' }}</td>
                    <td>{{ $detail->kemanisan->nama ?? '-' }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>Rp {{ number_format($detail->harga_saat_transaksi, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($detail->harga_saat_transaksi * $detail->jumlah, 0, ',', '.') }}</td>
                    <td>
                        @if($detail->toppings->count())
                            <ul>
                                @foreach($detail->toppings as $top)
                                    <li>{{ $top->topping->nama ?? '-' }} (Rp {{ number_format($top->harga_topping_saat_transaksi,0,',','.') }})</li>
                                @endforeach
                            </ul>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
            @if($transaksi->detailTransaksi->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">Belum ada detail produk</td>
                </tr>
            @endif
        </tbody>
    </table>

    <a href="{{ route('admin.transaksi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
