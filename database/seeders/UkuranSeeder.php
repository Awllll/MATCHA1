<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ukuran; 

class UkuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_ukuran' => 'Small',
                'harga_tambahan' => 0,
            ],
            [
                'nama_ukuran' => 'Medium',
                'harga_tambahan' => 2000,
            ],
            [
                'nama_ukuran' => 'Large',
                'harga_tambahan' => 4000,
            ],
        ];

        foreach ($data as $item) {
            Ukuran::create($item);
        }
    }
}
