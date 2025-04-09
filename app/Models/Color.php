<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name'];


    public function colors()
    {
        return $this->hasMany(Color::class, 'color_id');
    }

}
