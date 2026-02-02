<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Attendance extends Model
{
    // Hubungkan ke nama tabel yang kita buat di migration tadi
    protected $table = 'absensis'; 

    protected $fillable = ['pegawai_id', 'tanggal', 'status', 'alasan'];

    // Relasi ke pegawai
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'pegawai_id');
    }
}