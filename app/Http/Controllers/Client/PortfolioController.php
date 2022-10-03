<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->language ?? 'vi';
        $portfolios = Portfolio::query()->with('category')->where([
            'status' => Portfolio::ACTIVE,
            'language' => $language
        ])->latest()->get();
        return view('client.pages.portfolio', compact('portfolios'));
    }

    public function detail($slug, Request $request)
    {
        $language = $request->language ?? 'vi';
        $portfolio = Portfolio::query()
            ->where([
                'status' => Portfolio::ACTIVE,
                'language' => $language,
                'slug' => $slug
            ])
            ->first();
        if (!$portfolio) {
            abort(404);
        }
        return view('client.pages.portfolio-detail', compact('portfolio'));
    }
}
