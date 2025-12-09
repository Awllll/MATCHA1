<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // PENTING: Panggil UserSeeder yang baru kita buat
            UserSeeder::class,
            KategoriSeeder::class,
            UkuranSeeder::class,
            TingkatKemanisanSeeder::class,
        ]);
    }
}
