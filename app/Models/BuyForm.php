<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyForm extends Model
{
   use HasFactory;

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

   // Relación con Users 
   public function friend()
   {
       return $this->belongsTo(User::class, 'idFriend');
   }
}
