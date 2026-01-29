@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pegawai</h3>
                    <div class="card-tools">
                        <a href="{{ route('pegawai.create') }}" class="btn btn-primary btn-sm">Tambah Pegawai</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Aksi Admin</th>
                                <th>Absen Hari Ini</th> </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $p)
                            <tr>
                                <td>{{ $p->nip }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->position->name ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('absensi.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="pegawai_id" value="{{ $p->id }}">
                                        <div class="btn-group">
                                            <button name="status" value="Hadir" class="btn btn-sm btn-success">Hadir</button>
                                            <button name="status" value="Izin" class="btn btn-sm btn-warning">Izin</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection