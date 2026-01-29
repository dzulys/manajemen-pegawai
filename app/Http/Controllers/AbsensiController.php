<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance; // Menggunakan model Attendance sesuai file Anda

class AbsensiController extends Controller
{
    public function store(Request $request)
    {
        // Menyimpan data absen ke tabel absensis
        Attendance::updateOrCreate(
            [
                'pegawai_id' => $request->pegawai_id,
                'tanggal' => now()->toDateString(),
            ],
            ['status' => $request->status]
        );

        return back()->with('success', 'Absen berhasil dicatat!');
    }
}