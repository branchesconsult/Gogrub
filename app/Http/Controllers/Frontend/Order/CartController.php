<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Models\Product\Product;
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

        $data['cart_contents'] = Cart::content()->toArray();
        $data['subtotal'] = Cart::subtotal();
        $data['delivery_charges'] = 10;
        $data['total'] = Cart::total() + $data['delivery_charges'];
        //dd($data);
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
