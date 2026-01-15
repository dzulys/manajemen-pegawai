@extends('layouts.master') {{-- Pastikan pakai master dari AdminLTE nanti --}}

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Pegawai</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pegawai.store') }}" method="POST">
                @csrf <div class="form-group mb-3">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Nama Pegawai</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Email Perusahaan</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Jabatan</label>
                    <select name="position_id" class="form-control" required>
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach($jabatan as $j)
                            <option value="{{ $j->id }}">{{ $j->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="join_date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection