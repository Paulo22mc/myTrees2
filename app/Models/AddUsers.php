<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AddUsers extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Validar el rol de usuario.
     */
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