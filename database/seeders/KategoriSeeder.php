<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori; // Import Model

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gunakan Model Kategori agar otomatis masuk ke tabel 'kategoris'
        // dan pastikan nama kolomnya 'nama_kategori'

        Kategori::create([
            'nama_kategori' => 'Minuman',
            'deskripsi'     => 'Berbagai macam minuman panas dan dingin',
        ]);

        Kategori::create([
            'nama_kategori' => 'Makanan',
            'deskripsi'     => 'Menu makanan utama dan snack',
        ]);

        Kategori::create([
            'nama_kategori' => 'Topping',
            'deskripsi'     => 'Tambahan rasa untuk minuman',
        ]);

        Kategori::create([
            'nama_kategori' => 'Dessert',
            'deskripsi'     => 'Makanan penutup yang manis',
        ]);
    }
}
