<?php

namespace App\Repositories\Backend\RiderOrder;

use App\Models\Order\Order;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Firebase\FirebaseTrait;
use App\Models\Rider\RiderOrder\RiderOrderNotification;
use App\Models\Access\User\User;


class RiderOrderRepository extends BaseRepository
{
	use FirebaseTrait;

  public function sendOrderNotfication(Order $order)
  { 
  	//FireBase
  	// dd($order->id);
  	// dd($order);
    // $user=RiderOrderNotification::where('rider_id',53)->with('order')->get();
    // $user=$user->toJson();
    // dd($user);
     $database = $this->getDatabase();
     $riders_ref = $database->getReference('riders');
	   $allRiders= $riders_ref->getValue();
     $chefLat= $order->chef_location->getLat();
     $chefLng =$order->chef_location->getLng();
  
// dd($allRiders);

	 foreach ($allRiders as $key => $value) {
	 
   $distance = $this->distance($chefLat,$chefLng,$value['lat'],$value['lng']);
   
   //if user is in table and status is 0 then we can't insert into table

     if($distance<6)
     { 
         $rider_order_not = new RiderOrderNotification();
         $rider_order_not->rider_id = $key;
         $rider_order_not->order_id = $order->id;
         $rider_order_not->save();
     }
	 	
	 }
	 
}


function distance($lat1, $lon1, $lat2, $lon2) {

	// return Distance in Miles *Distance between two Lat lng
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
     return $miles;
	
}

	}



  public function getNotifyOrder($id)
  {
    // dd($id);
     $order=RiderOrderNotification::where('rider_id',$id)->with('order')->first();
     // dd($rider);
     // dd($order);
     $order = Order::with(['detail' => function ($q) {
            $q->with('product');
        }, 'user', 'ratingReview'])
            ->where('id', $order->order_id)
            ->first();
            // dd($order);
// dd($order->order_id);
      return $order;
  }

}

