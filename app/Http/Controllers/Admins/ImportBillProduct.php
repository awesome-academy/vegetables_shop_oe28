<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportBillProduct extends Model
{
    protected $table = 'import_bill_products';
    protected $fillable = [
        'product_id',
        'import_bill_id',
        'weight',
        'import_price',
        'outdate',
        'unit',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
