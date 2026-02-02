@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Pengajuan Izin / Sakit</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pegawai</th>
                                <th>Status</th>
                                <th>Alasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengajuan as $p)
                            <tr>
                                <td>{{ $p->tanggal }}</td>
                                <td>{{ $p->employee->name ?? 'N/A' }}</td>
                                <td>{{ $p->status }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($p->alasan, 80) }}</td>
                                <td>
                                    <a href="{{ route('absensi.show', $p->id) }}" class="btn btn-sm btn-info">Lihat Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $pengajuan->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection