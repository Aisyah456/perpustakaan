<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgendaLibrary extends Model
{
    use HasFactory;

    protected $table = 'agenda_libraries';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tempat',
        'tanggal_mulai',
        'tanggal_selesai',
        'jam',
        'penyelenggara',
        'poster',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
}
