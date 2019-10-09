<?php

namespace App\Http\Controllers\Api\V1\Rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\RiderOrder\RiderOrderRepository;
use Auth;


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
  		return response()->json([
  			'order'=> $order,
  			 'success'=>true,
  			 'status'=>200

  		]);
  }

}
