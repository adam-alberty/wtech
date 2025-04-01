<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_item';

    public $timestamps = false;

    protected $fillable = ['cart_id', 'sku_id', 'quantity'];
}
