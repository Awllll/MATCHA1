{{-- @extends('layout.karyawan')
@section('content')
<h3>Personalisasi: {{ $produk->nama }}</h3>

<form action="{{ route('kasir.addToCart', $produk->id) }}" method="POST">
    @csrf
    <input type="hidden" name="ukuran_id" value="{{ $ukuran->id }}">
    <input type="hidden" name="kemanisan_id" value="{{ $kemanisan->id }}">
    <input type="hidden" name="topping[]" value="{{ $topping->id }}">
    <button type="submit" class="btn btn-success w-100">Tambah ke Keranjang</button>
</form>

@endsection --}}

@extends('layout.karyawan')
@section('content')
<h3>Personalisasi: {{ $produk->nama }}</h3>

<form action="{{ route('kasir.addToCart', $produk->id) }}" method="POST">
    @csrf
    <input type="hidden" name="produk_id" value="{{ $produk->id }}">

    <label>Ukuran</label>
    <select name="ukuran_id" required class="form-control mb-2">
        @foreach($ukuran as $u)
            <option value="{{ $u->id }}">{{ $u->nama }} (+{{ $u->harga_tambahan }})</option>
        @endforeach
    </select>

    <label>Kemanisan</label>
    <select name="kemanisan_id" required class="form-control mb-2">
        @foreach($kemanisan as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
        @endforeach
    </select>

    <label>Topping</label>
    <select name="topping[]" class="form-control mb-2" multiple>
        @foreach($topping as $t)
            <option value="{{ $t->id }}">{{ $t->nama }} (+{{ $t->harga }})</option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-success">Tambah ke Keranjang</button>
</form>
@endsection
