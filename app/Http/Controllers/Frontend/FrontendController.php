<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        $data['settingData'] = Setting::all();
        $products = Product::with(['images' => function ($q) {
            $q->take(1);
        }])->get()
            ->where('availability_from', '<=', Carbon::now())
            ->take(16)
            ->toArray();
        //dd($products);
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
