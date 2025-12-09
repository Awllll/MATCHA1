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
            Schema::create('tingkat_kemanisans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tingkat')->unique(); // Contoh: Normal (100%), Less Sugar (50%)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tingkat_kemanisan');
    }
};
