<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Attendance;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Menambahkan pengamanan agar hanya user yang sudah login 
     * yang bisa melihat dashboard.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hariIni = Carbon::today()->toDateString();

        // Mengambil data riil dari database
        $totalPegawai = Employee::count();
        $totalJabatan = Position::count();

        // Menghitung kehadiran riil dari model Attendance
        $jumlahHadir = Attendance::where('tanggal', $hariIni)
                                   ->where('status', 'Hadir')
                                   ->count();

        // Menghitung persentase kehadiran
        $hadirHariIni = $totalPegawai > 0 ? round(($jumlahHadir / $totalPegawai) * 100) : 0;
        
        // Menghitung jumlah Izin dan Sakit
        $izinSakit = Attendance::where('tanggal', $hariIni)
                                ->whereIn('status', ['Izin', 'Sakit'])
                                ->count();

        return view('dashboard', compact(
            'totalPegawai', 
            'totalJabatan', 
            'hadirHariIni', 
            'izinSakit'
        ));
    }
}