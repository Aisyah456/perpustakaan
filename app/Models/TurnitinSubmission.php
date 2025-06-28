<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurnitinSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim_nidn',
        'email',
        'judul',
        'file',
        'status'
    ];
}
