<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableTree extends Model
{
    use HasFactory;
    protected $table = 'tree';

    protected $fillable = ['id', 'idSpecie', 'ubication', 'status', 'size', 'price', 'photo'];

    // Relación con TreeSpecies (especie)
    public function specie()
    {
        return $this->belongsTo(TreeSpecies::class, 'idSpecie'); 
    }
}



