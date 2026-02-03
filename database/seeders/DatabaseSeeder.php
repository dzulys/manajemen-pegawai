<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Menjalankan JabatanSeeder agar pilihan jabatan muncul
        $this->call([
            JabatanSeeder::class,
        ]);

        // 2. Membuat Akun Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'AdminBarudak@gmail.com',
            'password' => Hash::make('AdminBarudak!@gmail.com'), // Password sesuai permintaan Anda
            'role' => 'admin', // Memastikan akun ini langsung menjadi admin
        ]);
    }
}