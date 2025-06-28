<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'name',
        'faculty',
        'program',
    ];

    public function clearances()
    {
        return $this->hasMany(Clearance::class);
    }
}
