<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance; // Menggunakan model Attendance sesuai file Anda

class AbsensiController extends Controller
{
    public function create(Request $request)
    {
        $pegawaiId = $request->query('pegawai_id');
        // Jika tidak ada pegawai_id, berikan daftar pegawai untuk dipilih
        if (!$pegawaiId) {
            $pegawaiList = \App\Models\Employee::orderBy('name')->get(['id', 'name']);
        } else {
            $pegawaiList = null;
        }

        return view('absensi.create', compact('pegawaiId', 'pegawaiList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:employees,id',
            'status' => 'required|in:Hadir,Izin,Sakit,Alfa',
            'alasan' => 'nullable|string'
        ]);

        // Menyimpan data absen ke tabel absensis
        Attendance::updateOrCreate(
            [
                'pegawai_id' => $request->pegawai_id,
                'tanggal' => now()->toDateString(),
            ],
            [
                'status' => $request->status,
                'alasan' => $request->alasan,
            ]
        );

        return redirect()->back()->with('success', 'Absen berhasil dicatat!');
    }

    public function index()
    {
        $absensis = Attendance::with('employee')->orderBy('tanggal', 'desc')->paginate(20);
        return view('absensi.index', compact('absensis'));
    }

    public function approvals()
    {
        // Hanya admin yang boleh melihat pengajuan
        if (!(Auth::user()->is_admin ?? false)) {
            abort(403, 'Akses ditolak');
        }

        $pengajuan = Attendance::with('employee')
            ->whereIn('status', ['Izin', 'Sakit'])
            ->orderBy('tanggal', 'desc')
            ->paginate(20);

        return view('absensi.approvals', compact('pengajuan'));
    }

    public function show($id)
    {
        $absen = Attendance::with('employee')->findOrFail($id);
        return view('absensi.show', compact('absen'));
    }
}