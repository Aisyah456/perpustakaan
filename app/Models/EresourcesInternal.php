<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EresourcesInternal extends Model
{
    use HasFactory;

    protected $table = 'eresources_internal';

    protected $fileable = [
        'nama',
        'url',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    /**
     * Scope untuk mendapatkan resources yang memiliki URL
     */
    public function scopeWithUrl($query)
    {
        return $query->whereNotNull('url');
    }

    /**
     * Scope untuk mendapatkan resources yang aktif (memiliki nama)
     */
    public function scopeActive($query)
    {
        return $query->whereNotNull('nama')->where('nama', '!=', '');
    }
}
