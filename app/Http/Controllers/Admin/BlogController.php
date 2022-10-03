<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\BlogPostRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index()
    {
        $limit = $request->limit ?? 10;
        $blogs = Blog::orderBy('status', 'desc')->paginate($limit);
        return view('core-ui.pages.blog.index', ['blogs' => $blogs]);
    }

    public function create()
    {
        return view('core-ui.pages.blog.create');

    }
    public function store(BlogPostRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'title' => $request->title,
                'desc'=>$request->desc,
                'feature_image'=>$request->feature_image,
                'status'=>$request->status,
                'language'=>$request->language,
                'content' => $request->content_value,
            ];
            $data['slug'] = str_slug($request->title);
            Blog::create($data);
            Session::flash('success', 'Create thành công');
            DB::commit();
            return redirect()->route('blog.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Create thất bại!');
            return response()
                ->json([
                    'success' => false,
                    'message' => $exception->getMessage()
                ]);
        }
    }

    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('core-ui.pages.blog.update', compact('blog'));
    }

    public function update($id, BlogPostRequest $request)
    {
        try {
            DB::beginTransaction();
            $blog = Blog::find($id);

            $data = [
                'title' => $request->title,
                'desc'=>$request->desc,
                'feature_image'=>$request->feature_image,
                'status'=>$request->status,
                'language'=>$request->language,
                'content' => $request->content_value,
            ];
            $data['slug'] = str_slug($request->title);
            $blog->update($data);
            DB::commit();
            Session::flash('success', 'Update thành công');
            return redirect()->route('blog.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Update thất bại!');
            return response()
                ->json([
                    'code' => 500,
                    'message' => $exception->getMessage()
                ]);
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            Blog::find($id)->delete();
            Session::flash('success', 'Deleted!');
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Not Found!');
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
