<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Models\Product\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
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
}
