@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Ajukan Izin / Sakit</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('absensi.store') }}" method="POST">
                        @csrf
                        @if($pegawaiId)
                            <input type="hidden" name="pegawai_id" value="{{ $pegawaiId }}">
                        @else
                            <div class="mb-3">
                                <label class="form-label">Pilih Pegawai</label>
                                <select name="pegawai_id" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach($pegawaiList as $pl)
                                        <option value="{{ $pl->id }}">{{ $pl->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="Izin">Izin</option>
                                <option value="Sakit">Sakit</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alasan</label>
                            <textarea name="alasan" class="form-control" rows="4" required></textarea>
                        </div>

                        <button class="btn btn-primary">Kirim Pengajuan</button>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-link">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection