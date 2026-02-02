@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Detail Absensi</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Tanggal</dt>
                        <dd class="col-sm-9">{{ $absen->tanggal }}</dd>

                        <dt class="col-sm-3">Pegawai</dt>
                        <dd class="col-sm-9">{{ $absen->employee->name ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">{{ $absen->status }}</dd>

                        <dt class="col-sm-3">Alasan</dt>
                        <dd class="col-sm-9">{{ $absen->alasan ?? '-' }}</dd>
                    </dl>

                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection