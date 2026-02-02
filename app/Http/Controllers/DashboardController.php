<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // Hanya admin yang boleh mengakses dashboard utama
        if (!(Auth::user()->is_admin ?? false)) {
            abort(403, 'Akses ditolak');
        }

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

        // Siapkan statistik mingguan (Minggu kerja: Senin - Sabtu)
        $weeks = [];
        $now = Carbon::now();
        for ($i = 0; $i < 6; $i++) { // 6 minggu terakhir termasuk minggu ini
            $start = $now->copy()->startOfWeek(Carbon::MONDAY)->subWeeks($i);
            $weeks[] = [
                'label' => $start->format('d M Y'),
                'start' => $start->toDateString(),
            ];
        }

        // Data awal untuk minggu pertama (minggu ini)
        $labels = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $data = [];
        $initialStart = $weeks[0]['start'];
        for ($d = 0; $d < 6; $d++) {
            $date = Carbon::parse($initialStart)->addDays($d)->toDateString();
            $data[] = Attendance::where('tanggal', $date)->where('status', 'Hadir')->count();
        }

        return view('dashboard', compact(
            'totalPegawai', 
            'totalJabatan', 
            'hadirHariIni', 
            'izinSakit',
            'weeks',
            'labels',
            'data'
        ));
    }

    /**
     * Return attendance counts for a given week (JSON)
     */
    public function attendanceByWeek(Request $request)
    {
        // Hanya admin
        if (!(Auth::user()->is_admin ?? false)) {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        $start = $request->query('start');
        if (!$start) {
            return response()->json(['message' => 'Parameter start diperlukan'], 400);
        }

        try {
            $startDate = Carbon::parse($start)->startOfDay();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Format tanggal tidak valid'], 400);
        }

        $labels = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $data = [];
        // Pastikan startDate adalah hari Senin
        $startDate = $startDate->startOfWeek(Carbon::MONDAY);

        for ($d = 0; $d < 6; $d++) {
            $date = $startDate->copy()->addDays($d)->toDateString();
            $data[] = Attendance::where('tanggal', $date)->where('status', 'Hadir')->count();
        }

        return response()->json(['labels' => $labels, 'data' => $data]);
    }
}