<?php

namespace App\Repositories\Backend\RiderOrder;

use App\Models\Order\Order;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Firebase\FirebaseTrait;
use App\Models\Rider\RiderOrder\RiderOrderNotification;
use App\Models\Access\User\User;
use DB;
use App\Models\Rider\RiderOrder\RiderOrder;
use Auth;


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

// dd($chefLng);
     // dd($allRiders);
  
// dd($allRiders);
// $start = microtime(true);
	 foreach ($allRiders as $key => $value) {
	 

   $distance = $this->distance($chefLat,$chefLng,$value['lat'],$value['lng']);
  
   //if user is in table and status is 0 then we can't insert into table
   // DB::enableQueryLog();
   
// Execute the query
        $rider_exist= RiderOrderNotification::where('rider_id',$key)
        ->where('is_accepted',0)
        ->get();
        

    // $query = DB::getQueryLog();
// dd($time);
      
        
     if($distance<6)
     {   
          if($rider_exist->isEmpty())   // if  none of the order is assign then we assign order to rider
         {
          // dd($key); 
              $rider_order_not = new RiderOrderNotification();
              $rider_order_not->rider_id = $key;
              $rider_order_not->order_id = $order->id;
              $rider_order_not->save();

         }
            
     }
	 	
	 }
   // $time = microtime(true) - $start;
   // dd($time);
	 
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
     if($order)
     {

     $order = Order::with(['detail' => function ($q) {
            $q->with('product');
        }, 'ratingReview'])
            ->where('id', $order->order_id)
            ->first();
            // dd($order);
// dd($order->order_id);
            return $order;
    }
    else
    {
      $object = (object)[];
      return $order;
    }
   }

   public function history()
{

    $rider_order = RiderOrder::with(['orders'=>function($u)
    {
      $u->select('id','chef_full_name','customer_full_name')->get();
    },'orders.detail'=>function($u)
    {
      $u->with(['product'=>function($u)
        {
          $u->select('id','name');
        }]);
    }])
    ->where('rider_id', Auth::user()->id )
    ->where('is_completed',1)->get();
    // dd($rider_order);
  
           return $rider_order;

   }
   public function getCurrentOrder()
   {
     // dd($id);
     $order=RiderOrder::where('rider_id',Auth::user()->id)->where('is_completed',0)->with('orders')->first();
     // dd($rider);
     // dd($order);
     // dd($order->order_id);

     if($order)
     {

     $order = Order::with(['detail' => function ($q) {
            $q->with('product');
        }, 'ratingReview'])
            ->where('id', $order->order_id)
            ->first();
            // dd($order);
// dd($order->order_id);
            return $order;
    }
    else
    {
      $object = (object)[];
      return $object;
    }

  }

}

