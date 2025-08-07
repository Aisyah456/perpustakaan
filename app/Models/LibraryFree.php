<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryFree extends Model
{
    use HasFactory;

    protected $table = 'library_free_teble';

    protected $fillable = [
        'nama',
        'nim',
        'faculty_id',
        'major_id',
        'no_hp',
        'email',
        'jenjang',
        'keperluan',
        'tahun_masuk',
        'tahun_lulus',
        'file_karya_ilmiah',
        'scan_ktm',
        'bukti_upload',
        'status',
    ];

    /**
     * Relasi ke Fakultas
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * Relasi ke Program Studi / Jurusan
     */
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
