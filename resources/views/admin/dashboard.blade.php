@extends('layouts.admin')

@section('content')

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
            <p class="text-gray-500 text-sm">Ringkasan penjualan dan akses cepat ke menu utama</p>
        </div>
        <div class="flex items-center gap-3">
             <div class="bg-white p-2 rounded-full shadow-sm border border-gray-100 flex items-center gap-2 px-3">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-sm font-semibold text-gray-700">Halo, {{ Auth::user()->name ?? 'Admin' }}</span>
             </div>
        </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">


        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Total Penjualan Hari Ini</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2 group-hover:text-green-600 transition">Rp 289.300</h3>
                </div>
                <div class="bg-green-50 p-2.5 rounded-xl text-green-600 group-hover:bg-green-600 group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
        </div>


        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Jumlah Transaksi</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2 group-hover:text-blue-600 transition">5</h3>
                </div>
                <div class="bg-blue-50 p-2.5 rounded-xl text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
            </div>
        </div>


        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Pelanggan</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2 group-hover:text-purple-600 transition">5</h3>
                </div>
                <div class="bg-purple-50 p-2.5 rounded-xl text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </div>
        </div>

    </div>

    {{-- BAGIAN INI KALO MAU DI RUBAH BACKEND YAAA, YANG DI BAWAH NYA INI --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

        <div class="mb-6">
            <h3 class="text-lg font-bold text-gray-800">Riwayat Transaksi Terbaru</h3>
            <p class="text-gray-400 text-sm">10 transaksi terakhir hari ini</p>
        </div>

        <div class="space-y-4">

            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-green-50 transition border border-transparent hover:border-green-100 group">
                <div class="flex items-center gap-4">
                    <div class="bg-white p-3 rounded-lg text-green-600 shadow-sm font-bold border border-green-100 group-hover:bg-green-600 group-hover:text-white transition">
                        TRX001
                    </div>
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-gray-800 font-semibold">Walk-in Customer</span>
                            <span class="bg-green-100 text-green-700 text-[10px] px-2 py-0.5 rounded-full uppercase font-bold tracking-wide">Selesai</span>
                        </div>
                        <div class="text-gray-400 text-xs flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            10:30 WIB
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="font-bold text-green-600 text-lg">Rp 74.800</div>

                    <a href="{{ route('admin.transaksi.detail') }}" class="text-xs text-green-600 flex items-center justify-end gap-1 mt-1 hover:text-green-800 font-medium transition cursor-pointer">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        Detail
                    </a>
                </div>
            </div>

            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-green-50 transition border border-transparent hover:border-green-100 group">
                <div class="flex items-center gap-4">
                    <div class="bg-white p-3 rounded-lg text-green-600 shadow-sm font-bold border border-green-100 group-hover:bg-green-600 group-hover:text-white transition">
                        TRX002
                    </div>
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-gray-800 font-semibold">John Doe</span>
                            <span class="bg-green-100 text-green-700 text-[10px] px-2 py-0.5 rounded-full uppercase font-bold tracking-wide">Selesai</span>
                        </div>
                        <div class="text-gray-400 text-xs flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            11:15 WIB
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="font-bold text-green-600 text-lg">Rp 38.500</div>
                    <a href="{{ route('admin.transaksi.detail') }}" class="text-xs text-green-600 flex items-center justify-end gap-1 mt-1 hover:text-green-800 font-medium transition cursor-pointer">
                        Detail
                    </a>
                </div>
            </div>

             <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-green-50 transition border border-transparent hover:border-green-100 group">
                <div class="flex items-center gap-4">
                    <div class="bg-white p-3 rounded-lg text-green-600 shadow-sm font-bold border border-green-100 group-hover:bg-green-600 group-hover:text-white transition">
                        TRX003
                    </div>
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-gray-800 font-semibold">Siti Aminah</span>
                            <span class="bg-green-100 text-green-700 text-[10px] px-2 py-0.5 rounded-full uppercase font-bold tracking-wide">Selesai</span>
                        </div>
                        <div class="text-gray-400 text-xs flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            12:00 WIB
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="font-bold text-green-600 text-lg">Rp 27.500</div>
                    <a href="{{ route('admin.transaksi.detail') }}" class="text-xs text-green-600 flex items-center justify-end gap-1 mt-1 hover:text-green-800 font-medium transition cursor-pointer">
                        Detail
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection
