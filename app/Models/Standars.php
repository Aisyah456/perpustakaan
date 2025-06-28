<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Standars extends Model
{
    protected $table = "standars";

    protected $fileable = [
        'title',
        'categorie',
        'author',
        'year',
        'writer',
        'type',
        'info',
        'cover',
        'documen'
    ];
}
