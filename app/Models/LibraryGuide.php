<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryGuide extends Model
{
    protected $fillable = ['judul', 'konten', 'file_pdf'];
}
