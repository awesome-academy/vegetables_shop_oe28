<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'status',
        'role_id',
    ];

    public function isAdmin()
    {
        return $this->role_id === config('role.admin');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
