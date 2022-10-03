<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\BannerPostRequest;
use App\Http\Requests\Admin\Banner\BannerUpdateRequest;
use App\Models\Banner;
use App\Models\ClientMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class BannerController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->limit ?? 10;
        $banners = Banner::orderBy('is_featured', 'desc')->orderBy('position', 'asc')->paginate($limit);
        return view('core-ui.pages.banner.index', ['banners'=> $banners]);
    }

    public function create()
    {
        return view('core-ui.pages.banner.create');
    }

    public function store(BannerPostRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                'title_en' => $request->title_en,
                'title_vi' => $request->title_vi,
                'desc_en' => $request->desc_en,
                'desc_vi' => $request->desc_vi,
                'image' => $request->image,
                'is_featured' => $request->is_featured,
                'position' => $request->position ?? 0,
            ];
            $data['slug_en'] = str_slug($request->title_en) ?? null;
            $data['slug_vi'] = str_slug($request->title_vi) ?? null;
            Banner::create($data);
            DB::commit();
            Session::flash('success', 'Thêm mới thành công');
            return redirect('admin/banners');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Thêm mới thất bại!');
            return response()
                ->json([
                    'code' => 500,
                    'message' => $exception->getMessage()
                ]);
        }
    }


    public function edit($id)
    {
        $banner = Banner::find($id);

        return view('core-ui.pages.banner.update', compact('banner'));
    }

    public function update($id, BannerUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $banner = Banner::find($id);

            $data = [
                'title_en' => $request->title_en,
                'title_vi' => $request->title_vi,
                'desc_en' => $request->desc_en,
                'desc_vi' => $request->desc_vi,
                'image' => $request->image,
                'is_featured' => $request->is_featured,
                'position' => $request->position,
            ];
            $data['slug_en'] = str_slug($request->title_en) ?? null;
            $data['slug_vi'] = str_slug($request->title_vi) ?? null;
            $banner->update($data);
            DB::commit();
            Session::flash('success', 'Update thành công');
            return redirect('admin/banners');
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
            Banner::find($id)->delete();
            Session::flash('success', 'Đã xóa thành công!');
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Xoá không thành công!');
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
