<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    // Tambahkan baris ini untuk mengizinkan pengisian kolom 'name'
    protected $fillable = ['name'];
}