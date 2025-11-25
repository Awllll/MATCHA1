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
        Schema::table('produk', function (Blueprint $table) {
            $table->integer('stok')->default(0)->after('harga');
        });

        Schema::table('topping', function (Blueprint $table) {
            $table->integer('stok')->default(0)->after('harga');
        });

        Schema::table('ukuran', function (Blueprint $table) {
            $table->integer('harga_tambahan')->default(0)->after('nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropColumn('stok');
        });

        Schema::table('topping', function (Blueprint $table) {
            $table->dropColumn('stok');
        });

        Schema::table('ukuran', function (Blueprint $table) {
            $table->dropColumn('harga_tambahan');
        });
    }
};
