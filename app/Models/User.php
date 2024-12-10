<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    
    protected $fillable = [
        'name',
        'lastName',
        'number',
        'email',
        'password',
        'address',
        'country',
        'role',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
    public function isAdministrator()
    {
        return $this->role === 'administrator';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    // Relación con trees (árboles en venta)
    public function trees()
    {
        return $this->hasMany(treeForSale::class, 'idFriend');
    }
}