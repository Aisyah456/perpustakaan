<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class LibraryOrganization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'parent_id',
        'level',
        'photo',
        'description',
    ];

    /**
     * Relasi ke parent (atasan langsung)
     */
    public function parent()
    {
        return $this->belongsTo(LibraryOrganization::class, 'parent_id');
    }

    /**
     * Relasi ke children (bawahan langsung)
     */
    public function children()
    {
        return $this->hasMany(LibraryOrganization::class, 'parent_id');
    }
}
