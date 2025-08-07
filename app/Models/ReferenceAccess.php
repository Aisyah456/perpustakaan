<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenceAccess extends Model
{
    use HasFactory;

    protected $table = 'reference_accesses_tabel';

    protected $fillable = [
        'fakultas',
        'prodi',
        'judul',
        'link',
        'deskripsi'
    ];
}
