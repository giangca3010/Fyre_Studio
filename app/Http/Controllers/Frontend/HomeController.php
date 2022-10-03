<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $banners = Banner::where('is_featured', '1')->get();
        $services = Service::orderBy('position', 'desc')->get();
        $portfolio = Portfolio::get()->groupBy('category_portfolio');

        dd($portfolio);
    }
}
