<?php

namespace App\Models\Order\Traits;

use App\Models\Access\User\User;
use App\Models\OrderDetails\OrderDetail;
use App\Models\Orderstatus\Orderstatus;
use App\Models\Product\Product;

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

    /**
     * Get the post that owns the comment.
     */
    public function status()
    {
        return $this->belongsTo(Orderstatus::class, 'orderstatus_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
