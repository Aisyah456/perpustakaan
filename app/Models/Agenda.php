<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillabe = [
        'judul',
        'tanggal',
        'img',
        'isi',
        'admin',
        'category'
    ];
}
