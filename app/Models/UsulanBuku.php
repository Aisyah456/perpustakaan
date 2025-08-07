<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengusul',
        'nim',
        'fakultas',
        'program_studi',
        'status',
        'judul_buku',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'alasan',
        'verifikasi',
    ];
}
