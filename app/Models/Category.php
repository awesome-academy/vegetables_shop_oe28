<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent_id',
        'level',
    ];

    public function categoryParent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
