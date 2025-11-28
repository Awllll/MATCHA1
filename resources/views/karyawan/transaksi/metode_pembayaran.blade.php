@extends('layout.full')

@section('title','Pilih Metode Pembayaran')

@section('content')
<h3>Pilih Metode Pembayaran</h3>

<form action="{{ route('kasir.checkout') }}" method="POST">
    @csrf
    <ul>
        @foreach($cart as $item)
            <li>{{ $item['nama'] }} - Qty: {{ $item['qty'] }} - Rp {{ number_format($item['harga']) }}</li>
        @endforeach
    </ul>

    <p><strong>Total: Rp {{ number_format($total) }}</strong></p>

    <input type="hidden" name="nama_pembeli" value="{{ session('checkout_data.nama_pembeli') }}">

    <select name="metode_pembayaran_id" class="form-control mb-2" required>
        <option value="">-- Pilih Metode Pembayaran --</option>
        @foreach($metode as $m)
            <option value="{{ $m->id }}">{{ $m->nama }}</option>
        @endforeach
    </select>

    @error('metode_pembayaran_id')
    <div class="text-danger">{{ $message }}</div> @enderror

    <button type="submit" class="btn btn-success">Bayar</button>
</form>
@endsection
