<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PanduanPerpustakaan extends Model
{
    use HasFactory;

    protected $table = 'panduan_perpustakaan';

    protected $fillable = [
        'judul',
        'deskripsi',
        'link'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
