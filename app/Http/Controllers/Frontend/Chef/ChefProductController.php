<?php

namespace App\Http\Controllers\Frontend\Chef;

use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChefProductController extends Controller
{
    public function index()
    {

        $products = Product::with(['images' => function ($q) {

        }, 'cuisine', 'chef'])->where('chef_id', \Auth::id())
            ->orderBy('id', 'DESC')
            ->paginate(16);
        return view('frontend.chef.products.product-list', compact('products'));
    }
}
