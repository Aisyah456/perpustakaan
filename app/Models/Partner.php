<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'link',
        'logo',
        'hover_logo',
        'background_image',
        'is_active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the logo URL
     */
    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('lib/img/clients/' . $this->logo);
        }
        return asset('placeholder.svg?height=80&width=120');
    }

    /**
     * Get the hover logo URL
     */
    public function getHoverLogoUrlAttribute()
    {
        if ($this->hover_logo) {
            return asset('lib/img/clients/' . $this->hover_logo);
        }
        return null;
    }

    /**
     * Get the background image URL
     */
    public function getBackgroundImageUrlAttribute()
    {
        if ($this->background_image) {
            return asset('lib/img/clients/' . $this->background_image);
        }
        return null;
    }

    /**
     * Scope for active partners
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for inactive partners
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    /**
     * Get partners ordered by name
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('name');
    }
}
