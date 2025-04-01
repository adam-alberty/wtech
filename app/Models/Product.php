<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['slug', 'name', 'description', 'brand'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }
}
