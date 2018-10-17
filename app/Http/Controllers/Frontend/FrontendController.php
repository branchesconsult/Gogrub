<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Models\Product\Product;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use Carbon\Carbon;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['products'] = Product::with(['images' => function ($q) {
            $q->first();
        }, 'cuisine', 'chef'])
            ->where('availability_from', '<=', Carbon::now())
            ->where('availability_to', '>=', Carbon::now())
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->limit(16)
            ->get()
            ->toArray();
        $data['chefs'] = User::whereHas('roles', function ($q) {
            $q->where('name', 'Chef');
        })
            ->withCount('ratingReviews')
            ->get()->toArray();
        dd($data['products']);
        return view('frontend.index', $data);
    }

    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);
        return view('frontend.pages.index')
            ->withpage($result);
    }
}
