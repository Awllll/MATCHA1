@extends('layouts.admin')

@section('content')

    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.dashboard') }}" class="bg-white border border-gray-200 p-2 rounded-lg hover:bg-gray-50 transition text-gray-600 flex items-center gap-2 px-4 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="text-sm font-medium">Kembali</span>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Detail Transaksi</h2>
            <p class="text-gray-500 text-sm">Rincian pembelian untuk transaksi terpilih</p>
        </div>
    </div>

    <div class="space-y-6 max-w-4xl">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex justify-between items-start mb-6 border-b border-gray-100 pb-4">
                <div>
                    <h3 class="text-xl font-bold text-gray-800 tracking-tight">TRX001</h3>
                    <p class="text-xs text-gray-400 mt-1">ID Referensi</p>
                </div>
                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wide border border-green-200">
                    Selesai
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-start gap-3">
                    <div class="bg-gray-50 p-2.5 rounded-lg text-gray-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-0.5 font-medium uppercase">Tanggal</p>
                        <p class="font-bold text-gray-800">22 November 2025</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="bg-gray-50 p-2.5 rounded-lg text-gray-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-0.5 font-medium uppercase">Waktu</p>
                        <p class="font-bold text-gray-800">10:30 WIB</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="bg-gray-50 p-2.5 rounded-lg text-gray-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-0.5 font-medium uppercase">Pelanggan</p>
                        <p class="font-bold text-gray-800">Walk-In Customer</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="bg-gray-50 p-2.5 rounded-lg text-gray-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-0.5 font-medium uppercase">Metode Pembayaran</p>
                        <p class="font-bold text-gray-800">Tunai (Cash)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-1">Item Pesanan</h3>
            <p class="text-gray-400 text-sm mb-6">Daftar menu yang dibeli dalam transaksi ini</p>

            <div class="space-y-4">
                <div class="flex justify-between items-start pb-4 border-b border-dashed border-gray-200 last:border-0 last:pb-0">
                    <div class="flex gap-4">
                        <div class="h-12 w-12 bg-green-50 rounded-lg flex items-center justify-center text-green-600 font-bold text-sm">
                            2x
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Cappuccino Ice</h4>
                            <p class="text-xs text-gray-500 mt-0.5">+ Extra Shot Espresso</p>
                            <p class="text-xs text-gray-400 mt-1">@ Rp 25.000</p>
                        </div>
                    </div>
                    <div class="font-bold text-gray-800">Rp 50.000</div>
                </div>

                <div class="flex justify-between items-start pb-4 border-b border-dashed border-gray-200 last:border-0 last:pb-0">
                    <div class="flex gap-4">
                        <div class="h-12 w-12 bg-green-50 rounded-lg flex items-center justify-center text-green-600 font-bold text-sm">
                            1x
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Matcha Toast</h4>
                            <p class="text-xs text-gray-500 mt-0.5">-</p>
                            <p class="text-xs text-gray-400 mt-1">@ Rp 18.000</p>
                        </div>
                    </div>
                    <div class="font-bold text-gray-800">Rp 18.000</div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Ringkasan Pembayaran</h3>

            <div class="space-y-3 text-sm">
                <div class="flex justify-between text-gray-600">
                    <span>Subtotal</span>
                    <span class="font-medium">Rp 68.000</span>
                </div>
                <div class="flex justify-between text-gray-600 border-b border-gray-100 pb-4">
                    <span>Pajak (PPN 10%)</span>
                    <span class="font-medium">Rp 6.800</span>
                </div>
                <div class="flex justify-between items-center pt-2">
                    <span class="font-bold text-gray-800 text-lg">Total Bayar</span>
                    <span class="font-bold text-green-600 text-xl">Rp 74.800</span>
                </div>
            </div>
        </div>

    </div>

@endsection
