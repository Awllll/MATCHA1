<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TingkatKemanisanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tingkat_kemanisan')->insert([
            ['nama' => 'Normal', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Less Sugar', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'No Sugar', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Extra Sugar', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
