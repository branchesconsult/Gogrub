<?php

namespace App\Http\Controllers\Frontend\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function setGlobalUserLocation(Request $request)
    {
        $userAddress = session()->put('customer.customer_address', $request->session_customer_address);
        $userLocation = session()->put('customer.customer_location', $request->session_customer_location);
        return response()
            ->withCookie(cookie()->forever('customer.customer_address', $userAddress))
            ->withCookie(cookie()->forever('customer.customer_location', $userLocation));
    }
}
