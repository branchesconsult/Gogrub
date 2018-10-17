<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Models\Product\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    function __construct()
    {
        $this->middleware('cart.haveItems', ['only' => ['checkOutPage']]);
    }

    public function addProductToCart(Request $request)
    {
        $productId = $request->product_id;
        $product = Product::where('id', $productId)->with(['images' => function ($q) {
            $q->take(1);
        }])->first();
        $productName = $product->name;
        $qty = $request->qty;
        $productPrice = $product->price;
        $specialInstructions = $request->special_instructions;
        Cart::add($productId, $productName, $qty, $productPrice, [
            'special_instructions' => $specialInstructions
        ]);

        return response()->json([
            'success' => true,
            'cart_count' => Cart::count()
        ]);
    }

    /**
     *
     */
    public function checkOutPage()
    {
        if (!\Auth::check()) {
            return redirect()->to(route('frontend.auth.login'));
        }
        $data['cart_contents'] = Cart::content()->toArray();
        $data['subtotal'] = Cart::subtotal();
        $data['delivery_charges'] = 10;
        $data['total'] = Cart::total() + $data['delivery_charges'];
        $minDelieveryTime = 50;
        $data['delivery_slots'][] = 'ASAP';
        $addedTime = 45;
        for ($i = 0; $i <= 3; $i++) {
            $data['delivery_slots'][] = Carbon::now()
                ->addMinutes($minDelieveryTime + ($addedTime * $i))
                ->format('g:ia');
        }

        //dd($data['delivery_slots']);
        return view('frontend.cart.checkout', $data);
    }

    public function removeItem(Request $request)
    {
        Cart::remove($request->cartItemId);
        return response()->json([
            'success' => true,
            'cart_count' => Cart::count()
        ]);
    }
}
