<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'price_order',
        'note',
        'payment_method',
        'name',
        'address',
        'phone',
        'email',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
