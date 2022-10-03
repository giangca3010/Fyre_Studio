<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->language ?? 'vi';
        $blogs = Blog::query()
            ->where([
                'status' => Blog::ACTIVE,
                'language' => $language
            ])
            ->latest()
            ->paginate(6);
        return view('client.pages.blog', compact('blogs'));
    }

    public function detail($slug, Request $request)
    {
        $language = $request->language ?? 'vi';
        $blog = Blog::query()
            ->where([
                'status' => Blog::ACTIVE,
                'language' => $language,
                'slug' => $slug
            ])
            ->first();
        if (!$blog) {
            abort(404);
        }
        return view('client.pages.blog-detail', compact('blog'));
    }
}
