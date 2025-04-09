<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product_attribute';

    protected $fillable = ['product_id', 'name', 'order'];

}
