<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryHistory extends Model
{
    protected $fillable = ['year', 'title', 'description', 'icon'];
}
