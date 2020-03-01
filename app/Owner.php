<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'business_type', 'name', 'owner_phone', 'owner_email', 'owner_password'
    ];
}
