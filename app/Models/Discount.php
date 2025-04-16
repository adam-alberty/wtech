<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'code',
        'type',
        'amount',
        'expires_at'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
