<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $fillable = [
        'nama',
        'nim_nidn',
        'email',
        'topik_konsultasi',
        'pesan',
        'status'
    ];
}
