<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $tabel = "layanans";

    protected $fillable = [
        'img',
        'name',
        'deskripsi',
        'url'
    ];
}
