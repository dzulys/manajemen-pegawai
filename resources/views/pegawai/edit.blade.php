<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header"><h4>Edit Data Pegawai</h4></div>
                <div class="card-body">
                    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>NIP</label>
                            <input type="text" name="nip" value="{{ $pegawai->nip }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Nama Pegawai</label>
                            <input type="text" name="nama" value="{{ $pegawai->nama }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" value="{{ $pegawai->jabatan }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>