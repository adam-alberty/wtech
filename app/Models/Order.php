<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'delivery_type_id', 'payment_type_id', 'price', 'full_name', 'email',
        'phone_number', 'country', 'city', 'street_address', 'zip_code',
    ];
}
