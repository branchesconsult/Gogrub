<?php

namespace App\Http\Controllers\Frontend\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class LocationController extends Controller
{
    public function setGlobalUserLocation(Request $request)
    {
        $response = new Response();
        $userAddress = session()->put('customer.customer_address', $request->session_customer_address);
        $userLocation = session()->put('customer.customer_location', $request->session_customer_location);
        $userCity = session()->put('customer.customer_city', $request->session_customer_location);
        $userCountry = session()->put('customer.customer_country', $request->session_customer_country);
        return $response
            ->withCookie(cookie()->forever('customer.customer_address', $userAddress))
            ->withCookie(cookie()->forever('customer.customer_location', $userLocation))
            ->withCookie(cookie()->forever('customer.customer_country', $userCountry))
            ->withCookie(cookie()->forever('customer.customer_city', $userCity));
    }
}
