<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeeMyTrees extends Model
{
    use HasFactory;

    protected $table = 'tree';

    public function species()
    {
        return $this->belongsTo(TreeSpecies::class, 'idSpecie', 'id');
    }
}
