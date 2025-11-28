@extends('layout.full')

@section('title', 'Struk Transaksi')

@section('content')

<style>
    .struk-box {
        max-width: 350px;
        margin: auto;
        background: #fff;
        padding: 20px;
        border: 1px dashed #333;
        font-family: monospace;
    }
    .center {
        text-align: center;
    }
    .line {
        border-bottom: 1px dashed #333;
        margin: 10px 0;
    }
</style>

<div class="struk-box">

    <h4 class="center">STRUK PEMBELIAN</h4>
    <div class="center">Kasir: {{ $transaksi->pengguna->nama }}</div>

    <div class="line"></div>

    <p><strong>Nama Pembeli:</strong> {{ $transaksi->nama_pembeli }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Metode:</strong> {{ $transaksi->metodePembayaran->nama }}</p>

    <div class="line"></div>

    <h5>Daftar Pesanan:</h5>

    @foreach($transaksi->detailTransaksi as $detail)
        <div>
            {{ $detail->produk->nama }}
            (x{{ $detail->jumlah }})
            - Rp {{ number_format($detail->harga_saat_transaksi) }}
        </div>

        @if($detail->topping->count() > 0)
            <div style="margin-left: 15px; font-size: 13px;">
                @foreach($detail->topping as $tp)
                    + {{ $tp->topping->nama }}
                @endforeach
            </div>
        @endif

        <div class="line"></div>
    @endforeach

    <h4>Total: Rp {{ number_format($transaksi->total_harga) }}</h4>

    <div class="line"></div>

    <div class="center">
        Terima Kasih!
        <br>Semoga Hari Anda Menyenangkan 😊
    </div>

</div>

<div class="center mt-3">
    <a href="{{ route('karyawan.dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    <button onclick="window.print()" class="btn btn-success">Print Struk</button>
</div>

@endsection
