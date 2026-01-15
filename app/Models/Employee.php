<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Memberitahu Laravel bahwa tabelnya bernama 'employees'
    protected $table = 'employees';

    // Daftar kolom yang boleh diisi
    protected $fillable = [
        'nip', 
        'name', 
        'email', 
        'password', 
        'position_id', 
        'address', 
        'phone', 
        'join_date',
        'is_active'
    ];

    // Relasi: Setiap karyawan memiliki satu jabatan
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}