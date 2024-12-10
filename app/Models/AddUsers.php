<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AddUsers extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    
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


    //Validar los roles 
    public function isAdministrator()
    {
        return $this->role === 'administrator';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function trees()
    {
        return $this->hasMany(treeForSale::class, 'idFriend');
    }
}