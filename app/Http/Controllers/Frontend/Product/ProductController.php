<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {

    }

    public function show($productSlug)
    {
        $data['product'] = Product::with(['chef' => function ($q) {
            $q->with(['ratingReviews.user', 'products' => function ($q1) {
                $q1->with(['chef', 'cuisine'])->take(6);
            }]);
        }, 'images'])
            ->where('slug', $productSlug)
            ->firstOrFail()->toArray();
        //dd($data);
        return view('frontend.products.product-detail', $data);
    }
}
