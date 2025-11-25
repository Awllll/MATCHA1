@extends('layout.karyawan')

@section('content')
<h1>Keranjang</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(count($cart) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Ukuran</th>
                <th>Kemanisan</th>
                <th>Topping</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $id => $item)
            <tr>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['ukuran'] ?? '-' }}</td>
                <td>{{ $item['kemanisan'] ?? '-' }}</td>
                <td>
                    @if(!empty($item['topping']))
                        @php
                            $toppingNames = \App\Models\Topping::whereIn('id', $item['topping'])->pluck('nama')->toArray();
                        @endphp
                        {{ implode(', ', $toppingNames) }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $item['qty'] }}</td>
                <td>Rp {{ number_format($item['harga']) }}</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Hapus item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Checkout</button>
    </form>
@else
    <p>Keranjang kosong.</p>
@endif

<a href="{{ route('karyawan.dashboard') }}" class="btn btn-secondary mt-3">Kembali ke Menu</a>
@endsection
