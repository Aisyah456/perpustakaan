<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $fillable = [
        'title',
        'description',
        'file_path',
        'category',
        'is_active',
    ];

    /**
     * Scope untuk mengambil panduan yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
