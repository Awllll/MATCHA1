<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodePembayaranSeeder extends Seeder
{
    public function run()
    {
        DB::table('metode_pembayaran')->insert([
            ['nama' => 'Tunai', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'QRIS', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Debit', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
