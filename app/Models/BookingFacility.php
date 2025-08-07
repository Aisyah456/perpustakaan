<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingFacility extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'nim',
        'fakultas',
        'program_studi',
        'kontak',
        'fasilitas',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'keperluan',
        'status',
    ];
}
