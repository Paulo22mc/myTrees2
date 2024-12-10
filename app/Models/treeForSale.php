<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class treeForSale extends Model
{

    protected $table = 'tree';
    protected $fillable = [
        'idSpecie',
        'idFriend',
        'ubication',
        'status',
        'size',
        'price',
        'photo'
    ];

    // Relación con TreeSpecies (especie)
    public function specie()
    {
        return $this->belongsTo(TreeSpecies::class, 'idSpecie');
    }

    // Relación con User
    public function friend()
    {
        return $this->belongsTo(User::class, 'idFriend');
    }
}
