<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AskLibrarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'fakultas',
        'prodi',
        'kategori',
        'pertanyaan',
        'jawaban',
        'status',
    ];
}
