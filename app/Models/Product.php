<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'suplier_id',
        'price',
        'price_discount',
        'description',
        'weight_item',
        'weight_available',
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

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
