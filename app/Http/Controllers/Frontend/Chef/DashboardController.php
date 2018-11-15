<?php

namespace App\Http\Controllers\Frontend\Chef;

use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('frontend.chef.dashboard');
    }
}
