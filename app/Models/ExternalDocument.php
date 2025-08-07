<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'link'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessors
    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d M Y H:i');
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at->format('d M Y H:i');
    }

    public function getShortDescriptionAttribute()
    {
        return $this->deskripsi ? String::limit($this->deskripsi, 100) : '-';
    }

    public function getShortLinkAttribute()
    {
        return String::limit($this->link, 50);
    }

    public function getCategoryColorAttribute()
    {
        return match ($this->kategori) {
            'Jurnal' => 'primary',
            'Publikasi' => 'success',
            'Buku' => 'info',
            'Artikel' => 'warning',
            'Thesis' => 'danger',
            'Laporan' => 'dark',
            default => 'secondary'
        };
    }

    public function getDomainAttribute()
    {
        $parsed = parse_url($this->link);
        return isset($parsed['host']) ? $parsed['host'] : 'Unknown';
    }

    // Scopes
    public function scopeByCategory($query, $category)
    {
        return $query->where('kategori', $category);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('judul', 'like', "%{$search}%")
            ->orWhere('deskripsi', 'like', "%{$search}%");
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    // Static methods
    public static function getCategories()
    {
        return ['Jurnal', 'Publikasi', 'Buku', 'Artikel', 'Thesis', 'Laporan', 'Lainnya'];
    }

    public static function getCategoryStats()
    {
        return self::selectRaw('kategori, COUNT(*) as count')
            ->groupBy('kategori')
            ->pluck('count', 'kategori')
            ->toArray();
    }

    public static function getPopularDomains($limit = 5)
    {
        return self::all()->groupBy(function ($item) {
            $parsed = parse_url($item->link);
            return isset($parsed['host']) ? $parsed['host'] : 'Unknown';
        })->map(function ($group) {
            return $group->count();
        })->sortDesc()->take($limit);
    }
}
