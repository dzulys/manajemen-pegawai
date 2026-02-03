<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan pengecekan foreign key agar bisa truncate
        Schema::disableForeignKeyConstraints();

        // Gunakan nama tabel 'positions' sesuai migration Anda
        DB::table('positions')->truncate();

        // Masukkan data dengan kolom 'name' dan 'salary'
        DB::table('positions')->insert([
            ['name' => 'Manager', 'salary' => 10000000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Staff IT', 'salary' => 8000000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Admin HR', 'salary' => 7000000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Marketing', 'salary' => 7500000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Finance', 'salary' => 8500000, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Aktifkan kembali pengecekan foreign key
        Schema::enableForeignKeyConstraints();
    }
}