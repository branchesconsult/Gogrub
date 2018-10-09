<?php

namespace App\Http\Controllers\Api\V1\Chef;

use App\Http\Requests\Api\Chef\ChefOrderUpdateRequest;
use App\Http\Requests\Api\Chef\GetOrdersRequest;
use App\Models\Order\Order;
use Illuminate\Http\Request;
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
        $chefOrders = Order::with(['detail', 'user', 'ratingReview'])
            ->where('orderstatus_id', $orderStatusId)
            ->where('chef_id', \Auth::id())
            ->orderByDesc('id')
            ->get();
        return response()->json([
            'orders' => $chefOrders
        ]);
    }

    /**
     * Get order by id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $order = Order::with(['detail', 'user', 'ratingReview'])
            ->where('id', $id)
            ->orderByDesc('id')
            ->first();
        return response()->json([
            'order' => $order
        ]);
    }

    /**
     * Update specific order
     * @param ChefOrderUpdateRequest $request
     */
    public function update(ChefOrderUpdateRequest $request)
    {

    }
}
