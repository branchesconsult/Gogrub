<?php

namespace App\Models\Rider\RiderOrder;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order\Order;
use App\Models\Access\User\User;

class RiderOrder extends Model
{
    protected $table = 'rider_orders';

    public function orders()
    {
    	return $this->belongsTo(Order::class,'order_id');
    }

    public function riders()
    {
    	return $this->belongsTo(User::class,'rider_id');
    }
    
    
    }
