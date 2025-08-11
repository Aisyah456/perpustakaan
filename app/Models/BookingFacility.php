<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingFacility extends Model
{
    protected $table = 'booking_facility';

    protected $fillable = [
        'nama_pemesan',
        'nim',
        'status_pemesan',
        'fakultas',
        'program_studi',
        'nama_fasilitas',
        'tanggal_pemakaian',
        'waktu_mulai',
        'waktu_selesai',
        'keperluan',
        'status_verifikasi',
    ];
}
