<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeUpdates extends Model
{
    use HasFactory;

    protected $table = 'updates';
    protected $fillable = ['idTree', 'idUser', 'date', 'size', 'photo'];

    public function tree()
    {
        return $this->belongsTo(TreeForSale::class, 'idTree');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');

    }

}
