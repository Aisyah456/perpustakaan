<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PerpustakaanMisi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perpustakaan_misi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deskripsi',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the poin for the misi.
     */
    public function poin(): HasMany
    {
        return $this->hasMany(PerpustakaanMisi::class, 'misi_id')
            ->orderBy('urutan')
            ->orderBy('nomor');
    }

    /**
     * Get the active poin for the misi.
     */
    public function activePoin(): HasMany
    {
        return $this->hasMany(PerpustakaanMisi::class, 'misi_id')
            ->where('is_active', true)
            ->orderBy('urutan')
            ->orderBy('nomor');
    }

    /**
     * Scope a query to only include active misi.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get the active misi.
     */
    public static function getActive()
    {
        return self::active()->latest()->first();
    }
}
