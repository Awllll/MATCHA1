<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeUkuranKemanisanNullableInDetailTransaksi extends Migration
{
    public function up(): void
    {
        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('ukuran_id')->nullable()->change();
            $table->unsignedBigInteger('kemanisan_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('ukuran_id')->nullable(false)->change();
            $table->unsignedBigInteger('kemanisan_id')->nullable(false)->change();
        });
    }
}
