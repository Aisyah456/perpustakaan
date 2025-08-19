<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LatestCollection extends Model
{
    protected $table = 'latest_collections';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'kategori',
        'deskripsi',
        'cover',
        'file',
        'link',
        'tanggal_masuk'
    ];
}
