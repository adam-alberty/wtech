<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'delivery_type_id', 'payment_type_id', 'price', 'full_name', 'email',
        'phone_number', 'country', 'city', 'street_address', 'zip_code',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function delivery_type()
    {
        return $this->belongsTo(DeliveryType::class, 'delivery_type_id');
    }

    public function payment_type()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id');
    }

}
