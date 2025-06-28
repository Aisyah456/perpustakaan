<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'deskripsi',
        'kategori_id',
        'cover'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
