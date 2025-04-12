<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SKU extends Model
{
    protected $fillable = ['product_id', 'sku', 'price_before', 'amount_in_stock'];

    protected $table = 'skus';
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'sku_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

}
