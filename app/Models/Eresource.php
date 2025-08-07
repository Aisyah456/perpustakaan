<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eresource extends Model
{
    protected $fillable = ['title', 'description', 'image', 'link', 'button_label'];
}
