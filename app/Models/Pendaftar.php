<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendaftar extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'tanggal_lahir',
        'jenis_vaksin',
        'lokasi_vaksin',
        'tanggal_vaksin',
        'status',
    ];
}
