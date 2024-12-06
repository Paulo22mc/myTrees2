<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeSpecies extends Model
{
    use HasFactory;

    protected $table = 'treeSpecie';

    protected $fillable = [
        'comercialName', 
        'scientificName'
    ];


    public function trees()
    {
        return $this->hasMany(treeForSale::class, 'idSpecie');
    }
}

