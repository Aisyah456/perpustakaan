<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benner extends Model
{
    protected $table = "benners";

    protected $fillable = [
        'label',
        'judul',
        'img',
        'isi'
    ];
}
