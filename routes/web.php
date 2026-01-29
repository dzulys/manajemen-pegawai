<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Penting untuk memperbaiki error Auth
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsensiController;

// 1. Halaman Utama: Menampilkan Dashboard Statistik
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// 2. Route Pengelolaan Data Pegawai (Otomatis: index, create, store, edit, update, destroy)
Route::resource('pegawai', PegawaiController::class);

// 3. Route untuk Menyimpan Absensi (Memperbaiki error Route not defined)
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');

// 4. Route Sistem Login & Registrasi
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');