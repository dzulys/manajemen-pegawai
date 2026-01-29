<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    // Hubungkan ke nama tabel yang kita buat di migration tadi
    protected $table = 'absensis'; 

    protected $fillable = ['pegawai_id', 'tanggal', 'status'];
}