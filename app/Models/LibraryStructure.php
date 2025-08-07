<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryStructure extends Model
{
    public function children()
    {
        return $this->hasMany(Struktur::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
}
