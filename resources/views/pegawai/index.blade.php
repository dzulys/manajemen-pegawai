@extends('layouts.master')

@section('content')
<div class="card mt-4">
    <div class="card-header d-flex justify-content-between">
        <h4>Daftar Pegawai</h4>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Pegawai</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $p)
                <tr>
                    <td>{{ $p->nip }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->position->name ?? 'Tidak Ada Jabatan' }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection