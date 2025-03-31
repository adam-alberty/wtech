<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_item';

    protected $fillable = ['order_id', 'sku_id', 'name', 'unit_price', 'quantity'];
}
