<?php

namespace App\Models\Order\Traits;

use App\Models\Access\User\User;
use App\Models\OrderDetails\OrderDetail;

/**
 * Class OrderRelationship
 */
trait OrderRelationship
{
    public function chef()
    {
        return $this->belongsTo(User::class, 'chef_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
