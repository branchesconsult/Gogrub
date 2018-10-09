<?php

namespace App\Models\Order\Traits;

use App\Models\Access\User\User;
use App\Models\OrderDetails\OrderDetail;
use App\Models\Orderstatus\Orderstatus;
use App\Models\Product\Product;
use App\Models\RatingReviews\RatingReview;

/**
 * Class OrderRelationship
 */
trait OrderRelationship
{
    public function chef()
    {
        return $this->belongsTo(User::class, 'chef_id');
    }

    /**
     * This is order's customer
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
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

    public function ratingReview()
    {
        return $this->hasMany(RatingReview::class, 'order_id');
    }
}
