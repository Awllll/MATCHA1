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
        Schema::create('detail_transaksi_topping', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_transaksi_id')->constrained('detail_transaksi')->cascadeOnDelete();
            $table->foreignId('topping_id')->constrained('topping');
            $table->integer('harga_topping_saat_transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_topping');
    }
};
