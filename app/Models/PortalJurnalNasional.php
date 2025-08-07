<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortalJurnalNasional extends Model
{
    use HasFactory;

    protected $table = 'portal_jurnal_nasional';

    protected $fillable = [
        'nama',
        'url',
        'deskripsi',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope untuk mendapatkan portal yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk mendapatkan portal yang memiliki URL
     */
    public function scopeWithUrl($query)
    {
        return $query->whereNotNull('url')->where('url', '!=', '');
    }

    /**
     * Accessor untuk mendapatkan status dalam bentuk text
     */
    public function getStatusTextAttribute()
    {
        return $this->is_active ? 'Aktif' : 'Tidak Aktif';
    }
}
