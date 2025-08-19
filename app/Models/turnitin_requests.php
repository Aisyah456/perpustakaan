<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turnitin_requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim_nidn',
        'email',
        'fakultas_prodi',
        'judul_naskah',
        'jenis_dokumen',
        'file',
        'catatan_pengguna',
        'status',
        'hasil_turnitin',
        'catatan_admin',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'badge-warning',
            'diproses' => 'badge-info',
            'selesai' => 'badge-success',
            'ditolak' => 'badge-danger',
        ];

        return $badges[$this->status] ?? 'badge-secondary';
    }

    public function getStatusTextAttribute()
    {
        $texts = [
            'pending' => 'Menunggu',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
        ];

        return $texts[$this->status] ?? 'Unknown';
    }

    public function getJenisDocumentBadgeAttribute()
    {
        $badges = [
            'Skripsi' => 'badge-primary',
            'Tesis' => 'badge-info',
            'Artikel' => 'badge-success',
            'Lainnya' => 'badge-secondary',
        ];

        return $badges[$this->jenis_dokumen] ?? 'badge-secondary';
    }
}
