@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Riwayat Absensi</h3>
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
                            @foreach($absensis as $a)
                            <tr>
                                <td>{{ $a->tanggal }}</td>
                                <td>{{ $a->employee->name ?? 'N/A' }}</td>
                                <td>{{ $a->status }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($a->alasan, 50) }}</td>
                                <td>
                                    <a href="{{ route('absensi.show', $a->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $absensis->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection