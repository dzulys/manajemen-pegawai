<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Position::insert([
        ['name' => 'Manager', 'salary' => 10000000],
        ['name' => 'IT Staff', 'salary' => 7000000],
        ['name' => 'HRD', 'salary' => 7000000],
    ]);
}
}