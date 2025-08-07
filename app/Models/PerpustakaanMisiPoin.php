<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerpustakaanMisiPoin extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perpustakaan_misi_poin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'misi_id',
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
     * Get the misi that owns the poin.
     */
    public function misi(): BelongsTo
    {
        return $this->belongsTo(PerpustakaanMisi::class, 'misi_id');
    }

    /**
     * Scope a query to only include active poin.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
