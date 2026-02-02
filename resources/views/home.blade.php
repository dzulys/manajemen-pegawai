@extends('layouts.app')

@section('content')
<div class="vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg,#f8fafc,#e9f1ff);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 text-center text-md-start">
        <h1 class="display-5 fw-bold mb-3">Selamat datang, {{ Auth::user()->name ?? 'Pengguna' }} 👋</h1>
        <p class="lead text-muted mb-4">Sistem Manajemen Pegawai yang simpel dan elegan — akses data absensi, pegawai, dan performa sesuai peran Anda.</p>

        @if(Auth::check() && (Auth::user()->is_admin ?? false))
          <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg shadow-sm">Buka Dashboard</a>
        @else
          <button class="btn btn-primary btn-lg shadow-sm" disabled>Buka Dashboard (Admin)</button>
          <p class="small text-muted mt-2">Dashboard hanya untuk admin. Hubungi administrator untuk meminta akses.</p>
        @endif

      </div>

      <div class="col-md-6 d-none d-md-block text-center">
        <!-- Minimal illustration -->
        <svg width="320" height="220" viewBox="0 0 320 220" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Illustration">
          <rect rx="16" width="320" height="220" fill="transparent" />
          <g transform="translate(20,20)">
            <rect x="0" y="0" width="120" height="80" rx="8" fill="#e9f1ff"/>
            <rect x="140" y="0" width="120" height="40" rx="8" fill="#d8e9ff"/>
            <rect x="140" y="60" width="120" height="20" rx="6" fill="#f3f6fb"/>
            <circle cx="60" cy="140" r="30" fill="#cfe4ff"/>
            <rect x="110" y="115" width="140" height="50" rx="8" fill="#f8fafc"/>
          </g>
        </svg>
      </div>
    </div>
  </div>
</div>
@endsection
