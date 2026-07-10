<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    // Karena nama tabel Anda kustom (library_staff)
    protected $table = 'library_staff';

    protected $fillable = [
        'name',
        'title',
        'division',
        'image',
        'is_head',
        'order',
    ];

    protected $casts = [
        'is_head' => 'boolean',
        'order' => 'integer',
    ];
}