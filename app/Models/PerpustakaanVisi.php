<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PerpustakaanVisi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perpustakaan_visi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deskripsi',
        'tahun_target',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'tahun_target' => 'integer',
    ];

    /**
     * Get the poin for the visi.
     */
    public function poin(): HasMany
    {
        return $this->hasMany(PerpustakaanVisi::class, 'visi_id')
            ->orderBy('urutan')
            ->orderBy('nomor');
    }

    /**
     * Get the active poin for the visi.
     */
    public function activePoin(): HasMany
    {
        return $this->hasMany(PerpustakaanVisi::class, 'visi_id')
            ->where('is_active', true)
            ->orderBy('urutan')
            ->orderBy('nomor');
    }

    /**
     * Scope a query to only include active visi.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get the active visi.
     */
    public static function getActive()
    {
        return self::active()->latest()->first();
    }
}
