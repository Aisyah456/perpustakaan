<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurnitinSubmission extends Model
{

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'id_fakultas');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'id_prodi');
    }

    // use HasFactory;

    protected $fillable = [
        'nama',
        'nim_nidn',
        'email',
        'judul',
        'file',
        'status'
    ];
}
