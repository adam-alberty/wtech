<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "slug", "parent_id"];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }
    public function parent_category()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children_categories()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

}
