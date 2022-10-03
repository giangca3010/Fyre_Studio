<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\CategoryPortfolio;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->language ?? 'vi';
        $banners = Banner::query()
            ->where([
                'is_featured' => Banner::ACTIVE
            ])
            ->orderBy('position')
            ->get();
        $aboutUs = AboutUs::query()->first();
        $services = Service::query()->orderBy('position')->get();
        $categoryPortfolios = CategoryPortfolio::query()->orderBy('position')->get();
        $portfolios = Portfolio::query()->with('category')->where([
            'status' => Portfolio::ACTIVE,
            'language' => $language
        ])->latest()->get();
        return view('client.pages.home', compact(
            'banners', 'aboutUs', 'services', 'categoryPortfolios', 'portfolios'
        ));
    }
}
