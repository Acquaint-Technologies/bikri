<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'product_type', 'product_name', 'sale_price', 'product_cost',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
