<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeSKU extends Model
{
    protected $table = 'attribute_sku';

    protected $fillable = ['product_id', 'sku_id', 'value', 'order'];
}
