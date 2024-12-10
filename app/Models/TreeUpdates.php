<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeUpdates extends Model
{
    use HasFactory;

    protected $table = 'updates';
    protected $fillable = ['idTree', 'idUser', 'date', 'size', 'photo'];

    // Relación con tree (árboles en venta)
    public function tree()
    {
        return $this->belongsTo(TreeForSale::class, 'idTree');
    }

    // Relación con Users
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

}
