<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class turnitin_requests extends Model
{
    protected $fillable = [
        'nama',
        'nim_nidn',
        'email',
        'fakultas_prodi',
        'judul_naskah',
        'jenis_dokumen',
        'file',
        'catatan_pengguna',
        'status',
        'hasil_turnitin',
        'catatan_admin'
    ];
}
