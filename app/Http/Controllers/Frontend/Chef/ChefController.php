<?php

namespace App\Http\Controllers\Frontend\Chef;

use App\Models\Access\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChefController extends Controller
{
    public function detail($chefId)
    {
        $data['chef'] = User::with(['products' => function ($q) {
            $q->with('cuisine')->orderBy('id', 'DESC')->limit(6);
        }, 'ratingReviews.user'])
            ->where('id', $chefId)
            ->first()
            ->toArray();
        //dd($data['chef']);
        return view('frontend.user.chef-detail', $data);
    }
}
