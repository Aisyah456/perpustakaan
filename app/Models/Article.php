<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article'; // nama tabel

    protected $fillable = [
        'judul',
        'slug',
        'kutipan',
        'isi',
        'gambar',
        'link_akses',
        'kategori_id',
        'user_id',
        'tanggal_publish',
        'status',
    ];

    protected $casts = [
        'tanggal_publish' => 'datetime',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
