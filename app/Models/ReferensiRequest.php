<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferensiRequest extends Model
{
    use HasFactory;

    protected $table = 'referensi_requests';

    protected $fillable = [
        'nama',
        'email',
        'topik',
        'pesan',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Scope untuk filter berdasarkan status
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeDiproses($query)
    {
        return $query->where('status', 'diproses');
    }

    public function scopeSelesai($query)
    {
        return $query->where('status', 'selesai');
    }

    // Accessor untuk format tanggal yang lebih readable
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d F Y, H:i');
    }

    public function getFormattedUpdatedAtAttribute()
    {
        return $this->updated_at->format('d F Y, H:i');
    }

    // Accessor untuk badge status
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => '<span class="badge bg-warning text-dark">Pending</span>',
            'diproses' => '<span class="badge bg-info text-dark">Diproses</span>',
            'selesai' => '<span class="badge bg-success">Selesai</span>'
        ];

        return $badges[$this->status] ?? '<span class="badge bg-secondary">Unknown</span>';
    }
}
