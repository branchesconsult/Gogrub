<?php

namespace App\Http\Controllers\Api\V1\Chef;

use App\Events\Frontend\Order\OrderUpdateEvent;
use App\Http\Requests\Api\Chef\ChefOrderUpdateRequest;
use App\Http\Requests\Api\Chef\GetOrdersRequest;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Repositories\Backend\RiderOrder\RiderOrderRepository;
use App\Http\Controllers\Controller;

/**
 * @resource Chef orders
 *
 * All categoru and product related functions
 */
class ChefOrderController extends Controller
{
    /**
     * List all chef orders
     * @param GetOrdersRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(GetOrdersRequest $request)
    {
        $orderStatusId = $request->orderstatus_id;
        $chefOrders = Order::with(['detail' => function ($q) {
            $q->with('product');
        }, 'user', 'ratingReview'])
            ->where('orderstatus_id', $orderStatusId)
            ->where('chef_id', \Auth::id())
            ->orderByDesc('id')
            ->get();
        return response()->json([
            'orders' => $chefOrders
        ]);
    }

    public function create()
    {

    }

    public function store()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Edit
     * @param $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * Get order by id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $order = Order::with(['detail' => function ($q) {
            $q->with('product');
        }, 'user', 'ratingReview'])
            ->where('id', $id)
            ->first();
        return response()->json([
            'order' => $order
        ]);
    }

    /**
     * Update specific order
     * @param ChefOrderUpdateRequest $request
     */
    public function update(ChefOrderUpdateRequest $request, $id)
    {
        $order = Order::find($id);
        $order->orderstatus_id = $request->orderstatus_id;
        $order->save();
        $chef =$order->chef_location;
        $status_id = 2;
        if($status_id==2)
        {
            $rider=new RiderOrderRepository();
           $rider->sendOrderNotfication($order);

        }
        event(new OrderUpdateEvent($order));
        return apiSuccessRes('Order updated successfully.');
    }
}
