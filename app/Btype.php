<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Btype extends Model
{
    protected $fillable = [
        'business_name', 'business_desc', 'status',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
