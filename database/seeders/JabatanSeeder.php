<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menghapus data lama agar tidak duplikat saat dijalankan ulang
        DB::table('jabatans')->truncate();

        // Mengisi data jabatan ke database Railway
        DB::table('jabatans')->insert([
            ['nama_jabatan' => 'Manager', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Staff IT', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Admin HR', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Marketing', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Finance', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}