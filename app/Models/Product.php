<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'suplier_id',
        'price',
        'price_discount',
        'description',
        'weight',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suplier_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
