<?php

namespace App\Http\Controllers\Api\V1\Rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\RiderOrder\RiderOrderRepository;
use App\Http\Requests\Api\Chef\ChefOrderUpdateRequest;
use Auth;
use App\Models\Rider\RiderOrder\RiderOrder;
use App\Models\Order\Order;
use App\Models\Access\User\User;
use App\Models\Rider\RiderOrder\RiderOrderNotification;
use DB;
use App\Models\Device\Device;


class RiderOrderController extends Controller
{
    public $riderOrderRepository;

    public function __construct(RiderOrderRepository $riderOrderRepository)
    {
    	 $this->riderOrderRepository=$riderOrderRepository;
    }

    public function notifyOfOrder()
    {
    	// dd(Auth::user()->id);
    		// $user = new RiderOrderRepository ;
// dd("order");

    	$order=$this->riderOrderRepository->getNotifyOrder(Auth::user()->id);
    	// dd($order);
      $message="Here is the orders";
      if(empty($order))
      {
        $message="no current orders";
      }
  		return response()->json([
  			'order'=> $order,
  			 'success'=>true,
  			 'status'=>200,
         'message'=>$message

  		]);
  }

  public function setOrderStatus(ChefOrderUpdateRequest $request, $id,$user_id)
    {
        
       //$id is order id
// dd($id);
        $order = Order::find($id);
// dd($order->chef_id);
        $token = array_column(Device::where('user_id',$order->chef_id)->get(['fcm_token'])
              ->toArray(),'fcm_token');
        /*
  @check if order is already accepted by another rider then the message will be throw 
  oops you are so late ! Order Already accpted by another Rider
       */
if($request->orderstatus_id==3)
{

  $rider_order = RiderOrder::where('rider_id',$user_id)
  ->where('order_id',$order->id)->first();
  if($rider_order)
  {

   $rider_order->is_completed=1;
   $rider_order->save();
    
              sendPushNotificationToFCMSever($token,"Your order # $order->id has delivered by Rider");
// dd($token);
    $not=DB::table('orders_rider_notifications')->where('order_id',$order->id)->delete();
   return response()->json([

            'status'=>200,
            'message'=>'Order Update successfully'

                             ]);
  }
  else
  {
     return response()->json([

            'status'=>200,
            'message'=>'No order found from given order id'

                             ]);
  }
}
elseif($request->orderstatus_id==5)
{

  $orderAccepted = RiderOrder::where('order_id',$order->id)->first();
  // dd($orderAccepted);

  if($orderAccepted==null)
    { 
        // dd($order->id);
         $user = User::find($user_id);
         $rider_order = new RiderOrder();
         $rider_order->order_id = $order->id;
         $rider_order->rider_id = $user->id;
         $rider_order->save();
          sendPushNotificationToFCMSever($token,"Your order # $order->id has accepted by Rider");

         $not=DB::table('orders_rider_notifications')->where('order_id',$order->id)
        ->where('rider_id','!=',$user->id)  
         ->delete();
      

         return response()->json([

            'status'=>200,
            'message'=>'Order Accepted Successfully'

                             ]);
         

    }

  else

    {
      return response()->json([

                   'status'=>200,
                   'message'=>'Opps ! you are late ! order has  Already accepted by another Rider'

                             ]);
    }  
  } 

  else if($request->orderstatus_id==6) //Order decline Api
  {
     $not=DB::table('orders_rider_notifications')->where('order_id',$order->id)
     ->where('rider_id',$user_id)
     ->delete();
      sendPushNotificationToFCMSever($token,"Your order # $order->id has declined
           by Rider");
     return response()->json([

            'status'=>200,
            'message'=>'Order declined Successfully'

                             ]);
  }
 
 }

 public function history()

 {

  $rider_order = $this->riderOrderRepository->history();

  // dd($rider_order);
  return response()->json([
    'status'=>200,
    'rider_order'=>$rider_order,
  ]);


 }
 public function currentOrder()
 {
  $order= $this->riderOrderRepository->getCurrentOrder();
  $message="Here is the orders";
      if(empty($order))
      {
        $message="no current orders";
      }
      return response()->json([
        'order'=> $order,
         'success'=>true,
         'status'=>200,
         'message'=>$message

      ]);
 }

}
