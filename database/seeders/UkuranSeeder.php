<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UkuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengganti isi, update database

        DB::table('ukuran')->whereBetween('id', [4, 6])->delete();

        DB::table('ukuran')->where('id', 1)->update([
            'harga_tambahan' => 1000,
            'updated_at' => now(),
        ]);

        DB::table('ukuran')->where('id', 2)->update([
            'harga_tambahan' => 3000,
            'updated_at' => now(),
        ]);

        DB::table('ukuran')->where('id', 3)->update([
            'harga_tambahan' => 5000,
            'updated_at' => now(),
        ]);

        // INI KALAU MAU SEED BARU, tapi kayanya ga perlu
        // DB::table('ukuran')->updateOrInsert([
        //     ['nama' => 'Small', 'harga_tambahan' => 1000, 'cretaed_at' => now(), 'updated at' => now()],
        //     ['nama' => 'Medium', 'harga_tambahan' => 3000, 'cretaed_at' => now(), 'updated at' => now()],
        //     ['nama' => 'Large', 'harga_tambahan' => 5000, 'cretaed_at' => now(), 'updated at' => now()],
        // ]);
    }
}
