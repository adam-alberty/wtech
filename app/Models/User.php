<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ["email", "password_hash", "first_name", "last_name", "verification_code"];
}
