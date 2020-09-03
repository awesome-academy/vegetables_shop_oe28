<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportBill extends Model
{
    protected $fillable = [
        'suplier_id',
        'import_date',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suplier_id');
    }

    public function importBillProducts()
    {
        return $this->hasMany(ImportBillProduct::class);
    }
}
