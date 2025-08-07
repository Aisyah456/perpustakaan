<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerpustakaanVisiPoin extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perpustakaan_visi_poin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'visi_id',
        'nomor',
        'deskripsi',
        'is_active',
        'urutan',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'nomor' => 'integer',
        'urutan' => 'integer',
    ];

    /**
     * Get the visi that owns the poin.
     */
    public function visi(): BelongsTo
    {
        return $this->belongsTo(PerpustakaanVisi::class, 'visi_id');
    }

    /**
     * Scope a query to only include active poin.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
