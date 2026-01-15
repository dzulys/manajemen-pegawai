<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Utama (Langsung menampilkan daftar pegawai/dashboard)
Route::get('/', [PegawaiController::class, 'index'])->name('home');

// 2. Route CRUD lengkap untuk Pegawai
// Ini akan otomatis mencakup: pegawai.index, pegawai.create, pegawai.store, dll.
Route::resource('pegawai', PegawaiController::class);