<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();

            // 1. Relasi ke tabel Users (Kasir yang melayani)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // 2. Data Transaksi
            $table->string('kode_transaksi')->unique(); // Contoh: TRX-2023001
            $table->string('nama_pembeli')->nullable(); // Nama customer (opsional)

            // 3. Keuangan
            // Gunakan decimal untuk harga agar lebih presisi daripada integer
            $table->decimal('total_harga', 15, 2);

            // 4. Metode Pembayaran & Status
            // Ubah jadi string dulu agar tidak error jika tabel master belum ada
            $table->string('metode_pembayaran')->default('tunai'); // tunai, qris, transfer
            $table->string('status')->default('selesai'); // pending, selesai, batal

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
