@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard Statistik</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary shadow-sm">
                <div class="inner">
                    <h3>{{ $totalPegawai }}</h3>
                    <p>Total Pegawai</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('pegawai.index') }}" class="small-box-footer link-light link-underline-opacity-0">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success shadow-sm">
                <div class="inner">
                    <h3>{{ $hadirHariIni }}<sup style="font-size: 20px">%</sup></h3>
                    <p>Hadir Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <a href="#" class="small-box-footer link-light link-underline-opacity-0">
                    Lihat Absensi <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-warning shadow-sm">
                <div class="inner">
                    <h3 class="text-white">{{ $izinSakit }}</h3>
                    <p class="text-white">Izin / Sakit</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-injured"></i>
                </div>
                <a href="#" class="small-box-footer link-light link-underline-opacity-0">
                    Lihat Pengajuan <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-danger shadow-sm">
                <div class="inner">
                    <h3>{{ $totalJabatan }}</h3>
                    <p>Total Jabatan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <a href="#" class="small-box-footer link-light link-underline-opacity-0">
                    Kelola Jabatan <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line me-1"></i>
                        Statistik Kehadiran (Minggu Ini)
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="absensiChart" style="height: 300px; width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('absensiChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line', // Jenis grafik: Garis
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                datasets: [{
                    label: 'Jumlah Pegawai Hadir',
                    data: [12, 19, 15, 17, 14, 10], // Data contoh
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    });
</script>
@endsection