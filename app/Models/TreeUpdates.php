<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeUpdates extends Model
{
    use HasFactory;

    protected $table = 'treeUpdates';
    protected $fillable = ['idTree', 'idUser', 'date', 'size', 'photo'];

    
}
