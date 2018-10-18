<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Models\Location\Location;
use App\Models\Product\Product;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        //Meter distance
        $latLng = breakLatLng(session()->get('customer.customer_location'));
        $searchWithIn = 5;
        $chefsInLocaton = Location::distance('location_point',
            new Point($latLng[0], $latLng[1]), 10)
            ->get()
            ->toArray();
        dd($chefsInLocaton, $latLng);
    }

    public function show($productSlug)
    {
        $data['product'] = Product::with(['chef' => function ($q) use ($productSlug) {
            $q->with(['ratingReviews.user', 'products' => function ($q1) use ($productSlug) {
                $q1->with(['chef', 'cuisine', 'images'])
                    ->where('slug', '<>', $productSlug)
                    ->take(6);
            }]);
        }, 'images'])
            ->where('slug', $productSlug)
            ->firstOrFail()->toArray();
        //dd($data);
        return view('frontend.products.product-detail', $data);
    }
}
