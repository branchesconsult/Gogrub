<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\Frontend\Order\OrderCreateEvent;
use App\Http\Requests\Api\Orders\GetOrderProcessRequest;
use App\Http\Requests\Api\Orders\MakeOrderRequest;
use App\Http\Requests\Api\Orders\RateAndReviewOrderRequest;
use App\Models\Access\User\User;
use App\Models\Device\Device;
use App\Models\Order\Order;
use App\Models\OrderDetails\OrderDetail;
use App\Models\Orderstatus\Orderstatus;
use App\Models\Product\Product;
use App\Models\RatingReviews\RatingReview;
use App\Models\Settings\Setting;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @resource Orders
 *
 * All Orders related functions
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientOrders = Order::where('customer_id', \Auth::id())
            ->with(['detail.product', 'status', 'chef'])
            ->orderByDesc('id')
            ->get();
        return response()->json([
            'orders' => $clientOrders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakeOrderRequest $request)
    {
        //dd($request->json()->all(), $request->all(), $request->products, $this->getChefByProducts($request->products));
        $gogrubCommission = Setting::where('setting_key', Setting::DEFAULT_GOGRUB_COMMISSION)
            ->first()
            ->setting_value;
        $products = $request->products;
        $customerPhone = $request->customer_phone;
        $customerAddress = $request->customer_address;
        $customerLocation = $request->customer_lat . ',' . $request->customer_lng;
        $estimateDeliveryMin = $request->estimate_delivery_mins;
        $delieveryCharges = $this->getDeliveryCharges();
        $paymentMethod = $request->payment_method;
        $specialInstructions = $request->special_instructions;

        $customer = User::find(\Auth::id());
        $chef = $this->getChefByProducts($products);
        if ($chef) {
            //Customer data for order
            $order['customer_id'] = $customer->id;
            $order['customer_full_name'] = $customer->full_name;
            $order['customer_phone'] = $customerPhone;
            $order['customer_email'] = $customer->email;
            $order['customer_address'] = $customerAddress;
            $order['customer_location'] = $customerLocation;
            //Cehf things
            $order['chef_location'] = $chef->locations->location_point->getLat() . ',' . $chef->locations->location_point->getLng();
            $order['chef_phone'] = $chef->locations->phone;
            $order['chef_full_name'] = $chef->full_name;
            $order['chef_email'] = $chef->email;
            //Other order things
            $order['invoice_num'] = Order::max('id');
            $order['orderstatus_id'] = Orderstatus::ORDER_PENDING;
            $order['special_instructions'] = $specialInstructions;
            $order['estimate_delivery_mins'] = $estimateDeliveryMin;
            $order['delivery_charges'] = $delieveryCharges;
            $order['chef_id'] = $chef->id;
            $order['subtotal'] = $this->getProductsTotal($products);
            $order['payment_method'] = $paymentMethod;
            $order['gogrub_commission'] = $gogrubCommission;
            $insertedOrderId = Order::create($order)->id;
            $this->insertOrderProducts($insertedOrderId, $products);
            $orderCreated = Order::with('detail.product', 'status')->where('id', $insertedOrderId)->first();
            event(new OrderCreateEvent($orderCreated));
            return response()->json([
                'message_title' => "Success",
                'message' => 'Order has been placed',
                'status_code' => 200,
                'success' => true,
                'order' => $orderCreated
            ]);
        }
        return apiErrorRes(403,
            'Products are from multiple chefs or chef location not found, so can not order.');
    }

    /**
     * Insert order detail with product id
     * @param $orderId
     * @param $products
     */
    public function insertOrderProducts($orderId, $products)
    {
        $productIds = array_column($products, 'id');
        $productsDetail = Product::whereIn('id', $productIds)->get();
        $orderDetail = [];

        foreach ($productsDetail as $key => $val) {
            $orderDetail['product_id'] = $val->id;
            $orderDetail['qty'] = $products[array_find($val->id, $products, 'id')]['qty'];
            $orderDetail['price'] = $val->price;
            $orderDetail['special_instructions'] = $products[array_find($val->id, $products, 'id')]['special_instructions'];
            $orderDetail['added_by'] = \Auth::id();
            $orderDetailModel[] = new OrderDetail($orderDetail);
        }
        Order::find($orderId)->detail()->saveMany($orderDetailModel);
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(['detail.product', 'chef', 'ratingReview', 'status'])
            ->where('id', $id)
            ->first();
        return response()->json([
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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


    public function getChefByProducts($products)
    {

        $productIds = array_column($products, 'id');
        $chef = Product::with(['chef.locations' => function ($q) {

        }])->whereIn('id', $productIds)
            ->has('chef.locations')
            ->groupBy('chef_id')
            ->get();
        return ($chef->count() > 1 || empty($chef[0]->chef->locations)) ? false : $chef[0]->chef;
    }

    /**
     * Get total of products in array
     * @param $products
     * @return mixed
     */
    public function getProductsTotal($products)
    {
        \Cart::destroy();
        $productIds = array_column($products, 'id');
        $productsDetail = Product::whereIn('id', $productIds)->get();
        $orderDetail = [];
        foreach ($productsDetail as $key => $val) {
            $orderDetail[$key]['id'] = $val->id;
            $orderDetail[$key]['name'] = $val->name;
            $orderDetail[$key]['qty'] = $products[array_find($val->id, $products, 'id')]['qty'];
            $orderDetail[$key]['price'] = $val->price;
        }
        \Cart::add($orderDetail);
        return \Cart::subtotal(0, null, null);
    }

    /**
     * Calculate delievery charges
     * @return int
     */
    public function getDeliveryCharges()
    {
        return 10;
    }

    /**
     * Rate order
     */

    public function rateOrder(RateAndReviewOrderRequest $request)
    {
        $hasRated = (boolean)RatingReview::where('user_id', \Auth::id())
            ->where('order_id', $request->order_id)
            ->count();
        if ($hasRated) {
            return apiErrorRes(401, 'You ahve already rated to this order');
        }
        $rating['order_id'] = $request->order_id;
        $rating['review'] = $request->review;
        $rating['rating'] = $request->rating;
        $rating['user_id'] = \Auth::id();
        $rating['chef_id'] = Order::find($rating['order_id'])->chef_id;
        RatingReview::create($rating);
        return apiSuccessRes('Rating successfully');
    }

    /**
     * Order process time
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrderProcessTime(GetOrderProcessRequest $request)
    {
        return response()->json([
            'prepration_time' => 23,
            'delivery_slots' => [
                45,
                60,
                120
            ]
        ]);
    }
}
