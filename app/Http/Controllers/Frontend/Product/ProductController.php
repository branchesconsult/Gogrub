<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Models\Location\Location;
use App\Models\Product\Product;
use Carbon\Carbon;
use GeoJson\Geometry\LineString;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        //Meter distance
        $latLng = breakLatLng(session()->get('customer.customer_location'));
        $chefsInLocaton = getChefWithinDistance($latLng[0], $latLng[1], 12);
        $data['products'] = Product::with(['images' => function ($q) {

        }, 'cuisine', 'chef'])
            ->whereIn('chef_id', $chefsInLocaton)
            ->where('availability_from', '<=', Carbon::now())
            ->where('availability_to', '>=', Carbon::now())
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(16);
        return view('frontend.products.product-list', $data);
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

        $latLng = breakLatLng(session()->get('customer.customer_location'));
        $chefDistance = getChefDistanceFromUserLocation(
            $data['product']['chef']['id'],
            breakLatLng(session()->get('customer.customer_location')));
        return view('frontend.products.product-detail', $data);
    }
}
