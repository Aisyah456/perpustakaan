<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryEvent extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'tempat',
        'tanggal_mulai',
        'tanggal_selesai',
        'penyelenggara'
    ];
}
