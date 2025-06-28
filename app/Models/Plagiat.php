<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plagiat extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'nim',
        'nama',
        'id_fakultas',
        'id_prodi',
        'kat_karya',
        'kat_mhs',
        'tujuan',
        'jdl_karya_1',
        'nm_pembimbing1',
        'email_pembimbing1',
        'nm_pembimbing2',
        'email_pembimbing2',
        'upload1',
        'jdl_karya_ilmiah',
        'upload2'
    ];
}
