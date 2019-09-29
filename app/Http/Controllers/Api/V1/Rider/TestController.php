<?php

namespace App\Http\Controllers\Api\V1\Rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class TestController extends Controller
{
    public function roleTest()
    {
    	if(Auth::user()->hasRole('Rider'))
    	{
    		dd("You are rider");
    	}
    	else
    	{
    		dd("You are Not rider");
    	}
    }
}
