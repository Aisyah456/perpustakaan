<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'nim',
        'nama_lengkap',
        'birthdate',
        'fakultas',
        'prodi',
        'jk',
        'alamat',
        'rt',
        'rw',
        'kecamatan',
        'kelurahan',
        'kota',
        'provinsi',
        'kode_pos',
        'no_hp',
        'email',
        'foto'
    ];
}
