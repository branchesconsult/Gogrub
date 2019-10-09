<?php

namespace App\Models\Rider\Traits;


use App\Models\Order\Order;
use App\Models\Access\User\User;
/**
 * Class ProductAttribute.
 */
trait RiderRelationshipTrait
{
   
     public function order()
     {
        return $this->belongsTo(Order::class);
     }
     
     public function rider()
     {
        return $this->belongsTo(User::class);
     }

}