<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Structure extends Model
{
    protected $fillable = ['name', 'position', 'parent_id', 'photo'];

    public function children()
    {
        return $this->hasMany(Structure::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Structure::class, 'parent_id');
    }
}
