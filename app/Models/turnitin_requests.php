<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class turnitin_requests extends Model
{
    protected $fillable = [
        'nama',
        'nim',
        'email',
        'judul',
        'file_path',
    ];
}
