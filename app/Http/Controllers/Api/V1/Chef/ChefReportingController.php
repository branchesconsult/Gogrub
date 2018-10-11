<?php

namespace App\Http\Controllers\Api\V1\Chef;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChefReportingController extends Controller
{
    public function getEarnings()
    {
        return response()->json([
            'total_earnings' => 2000,
            'current_month_earnings' => '56,000',
            'active_orders' => 5,
            'cancelled_orders' => 2,
            'completed_orders' => 89,
            'avg_rating' => 3.8
        ]);
    }
}
