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

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function skus()
    {
        return $this->hasMany(SKU::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collection_products');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
