<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'link',
        'logo',
        'hover_logo',
        'background_image',
    ];
}
