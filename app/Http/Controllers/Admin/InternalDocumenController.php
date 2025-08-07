<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InternalDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'file',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the file URL attribute.
     */
    // public function getFileUrlAttribute()
    // {
    //     if ($this->file) {
    //         return Storage::disk('public')->url($this->file);
    //     }
    //     return null;
    // }

    /**
     * Get the file size in human readable format.
     */
    public function getFileSizeAttribute()
    {
        if ($this->file && Storage::disk('public')->exists($this->file)) {
            $bytes = Storage::disk('public')->size($this->file);
            return $this->formatBytes($bytes);
        }
        return null;
    }

    /**
     * Get the file extension.
     */
    public function getFileExtensionAttribute()
    {
        if ($this->file) {
            return strtoupper(pathinfo($this->file, PATHINFO_EXTENSION));
        }
        return null;
    }

    /**
     * Format bytes to human readable format.
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, $precision) . ' ' . $units[$i];
    }

    /**
     * Scope to filter by category.
     */
    public function scopeByCategory($query, $kategori)
    {
        if ($kategori && $kategori !== 'all') {
            return $query->where('kategori', $kategori);
        }
        return $query;
    }

    /**
     * Scope to search documents.
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }
        return $query;
    }

    /**
     * Get available categories.
     */
    public static function getCategories()
    {
        return [
            'SOP' => 'SOP (Standard Operating Procedure)',
            'Panduan' => 'Panduan',
            'Memo' => 'Memo',
            'Kebijakan' => 'Kebijakan',
            'Formulir' => 'Formulir',
        ];
    }
}
