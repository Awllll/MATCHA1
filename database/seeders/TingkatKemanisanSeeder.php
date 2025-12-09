<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TingkatKemanisan; 

class TingkatKemanisanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TingkatKemanisan::create([
            'nama_tingkat' => 'Normal (100%)',
        ]);

        TingkatKemanisan::create([
            'nama_tingkat' => 'Less Sugar (75%)',
        ]);

        TingkatKemanisan::create([
            'nama_tingkat' => 'Half Sugar (50%)',
        ]);

        TingkatKemanisan::create([
            'nama_tingkat' => 'Little Sugar (25%)',
        ]);

        TingkatKemanisan::create([
            'nama_tingkat' => 'No Sugar (0%)',
        ]);
    }
}
