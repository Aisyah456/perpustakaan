<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformationLiteracy extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_pelatihan',
        'deskripsi',
        'narasumber',
        'tanggal',
        'waktu',
        'lokasi',
        'link_pendaftaran',
        'poster',
        'status',
    ];
}
