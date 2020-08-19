<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    public $table = 'supliers';

    protected $fillable = [
        'name', 'email', 'address', 'phone',
    ];
}
