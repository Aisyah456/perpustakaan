<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LiterasiRequest extends Model
{
    use HasFactory;

    // Nama tabel (opsional, karena Laravel otomatis pakai plural)
    protected $table = 'literasi_trainings';

    // Kolom yang bisa diisi mass-assignment
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

    // Relasi ke Fakultas
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    // Relasi ke Program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
