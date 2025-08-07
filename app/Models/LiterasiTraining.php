<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiterasiTraining extends Model
{
    protected $fillable = [
        'nama_peserta',
        'nim_nip',
        'email',
        'faculty_id',
        'program_id',
        'instansi',
        'jenis_pelatihan',
        'tanggal_pelatihan',
        'catatan',
        'status',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
