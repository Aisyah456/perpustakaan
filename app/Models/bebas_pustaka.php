<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bebas_pustaka extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'email',
        'status', // tambahkan kolom lain sesuai kebutuhan
    ];
}
