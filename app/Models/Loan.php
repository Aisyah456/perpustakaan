<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'nama',
        'nim',
        'judul_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];
}
