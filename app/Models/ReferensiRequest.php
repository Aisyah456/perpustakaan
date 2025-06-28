<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferensiRequest extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'topik', 'pesan', 'status'];
}
