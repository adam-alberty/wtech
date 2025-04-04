<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SKU extends Model
{
    protected $fillable = ['product_id', 'sku', 'price', 'price_before', 'amount_in_stock'];

    protected $table = 'skus';
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
