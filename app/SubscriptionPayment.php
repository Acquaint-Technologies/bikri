<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPayment extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['status_title'];

    public function getStatusTitleAttribute()
    {
        return ($this->status == 0) ? 'Pending' : 'Approved';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
