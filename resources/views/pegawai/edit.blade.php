@extends('layouts.master')

@section('content')
<div class="card mt-4">
    <div class="card-header"><h4>Edit Data Pegawai</h4></div>
    <div class="card-body">
        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip }}" readonly>
            </div>

            <div class="mb-3">
                <label>Nama Pegawai</label>
                <input type="text" name="name" class="form-control" value="{{ $pegawai->name }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $pegawai->email }}" required>
            </div>

            <div class="mb-3">
                <label>Jabatan</label>
                <select name="position_id" class="form-control" required>
                    @foreach($jabatan as $j)
                        <option value="{{ $j->id }}" {{ $pegawai->position_id == $j->id ? 'selected' : '' }}>
                            {{ $j->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection