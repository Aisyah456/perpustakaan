<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $fillable = ['judul', 'penulis', 'kategori', 'tahun', 'file_ebook'];
}
