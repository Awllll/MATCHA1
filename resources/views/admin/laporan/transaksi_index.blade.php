@extends('layout.admin')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Transaksi</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Kasir</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $index => $transaksi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaksi->nama_pembeli }}</td>
                    <td>{{ $transaksi->pengguna->nama ?? 'N/A' }}</td>
                    <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $transaksi->metodePembayaran->nama ?? 'N/A' }}</td>
                    <td>{{ $transaksi->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.transaksi.show', $transaksi->id) }}" class="btn btn-info btn-sm">Detail</a>

                        <form action="{{ route('admin.transaksi.destroy', $transaksi->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus transaksi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if($transaksis->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">Belum ada transaksi</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection

