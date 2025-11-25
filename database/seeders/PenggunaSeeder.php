<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengguna')->insert([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'owner',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
