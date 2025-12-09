<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin
        User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'role' => 'admin', // Role Admin
            'email' => 'admin@matcha.com',
            'password' => Hash::make('123456'),
        ]);

        // 2. Buat Akun Karyawan (Contoh)
        User::create([
            'name' => 'Karyawan Kasir',
            'username' => 'kasir',
            'role' => 'karyawan', // Role Karyawan
            'email' => 'kasir@matcha.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
