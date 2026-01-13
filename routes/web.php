<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

// 1. Landing Page (Saat orang buka localhost:8000 langsung muncul daftar pegawai)
Route::get('/', [PegawaiController::class, 'index']);

// 2. Route CRUD (Otomatis menghubungkan Tambah, Edit, dan Hapus)
Route::resource('pegawai', PegawaiController::class);