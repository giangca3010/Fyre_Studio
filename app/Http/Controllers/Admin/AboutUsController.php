<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();
//        dd(json_decode($aboutUs->box_about_vi));
        return view('core-ui.pages.aboutUs.index', ['aboutUs' => $aboutUs]);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $aboutUs = AboutUs::first();

            $data = [
                'title_en' => $request->title_en ?? '',
                'title_vi' => $request->title_vi ?? '',
                'desc_en' => $request->desc_en ?? '',
                'desc_vi' => $request->desc_vi ?? '',
                'banner' => $request->banner ?? '',
                'image_about' => $request->image ?? '',
                'about_en' => $request->about_en ?? '',
                'about_vi' => $request->about_vi ?? '',
                'content_en' => $request->content_en ?? '',
                'content_vi' => $request->content_vi ?? '',

            ];
            $data['slug_en'] = str_slug($request->about_en) ?? null;
            $data['slug_vi'] = str_slug($request->about_vi) ?? null;

            $data['box_about_en'] = json_encode([
                'title' => $request->title_box_en,
                'content' => $request->content_box_en,
            ]);
            $data['box_about_vi'] = json_encode([
                'title' => $request->title_box_vi,
                'content' => $request->content_box_vi,
            ]);
            if ($aboutUs){
                $aboutUs->update($data);
            }else{
                AboutUs::create($data);
            }
            Session::flash('success', 'Update thành công');
            DB::commit();
            return redirect('/admin/about-us');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Update thất bại!');
            return response()
                ->json([
                    'success' => false,
                    'message' => $exception->getMessage()
                ]);
        }
    }
}
