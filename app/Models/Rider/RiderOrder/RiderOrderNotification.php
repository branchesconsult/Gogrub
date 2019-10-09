<?php

namespace App\Models\Rider\RiderOrder;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rider\Traits\RiderRelationshipTrait;

class RiderOrderNotification extends Model
{
	use RiderRelationshipTrait;
    protected $table = 'orders_rider_notifications';
	public  $timestamps =false;   	

}