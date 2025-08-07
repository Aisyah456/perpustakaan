<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchTool extends Model
{
    protected $fillable = ['nama', 'kategori', 'deskripsi', 'link', 'ikon'];
}
