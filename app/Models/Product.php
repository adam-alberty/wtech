<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['slug', 'name', 'description', 'brand'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }

    public function image()
    {
        return $this->hasOne(ProductImage::class, 'product_id', 'id');
    }

    public function sku()
    {
        return $this->hasOne(SKU::class, 'product_id', 'id');
    }

}
