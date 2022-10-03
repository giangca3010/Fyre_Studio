<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Footer::orderBy('position', 'asc')->get();
        return view('core-ui.pages.footer.index', ['footers' => $footers]);
    }

    public function create()
    {
        return view('core-ui.pages.footer.create');

    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'footer_key' => $request->footer_key ?? '',
                'footer_value' => $request->footer_value ?? '',
                'position'=>$request->position ?? 0,
            ];
                Footer::create($data);
            Session::flash('success', 'Create thành công');
            DB::commit();
            return redirect('/admin/footers');
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
        $footer = Footer::find($id);

        return view('core-ui.pages.footer.update', compact('footer'));
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $footer = Footer::find($id);

            $data = [
                'footer_key' => $request->footer_key ?? '',
                'footer_value' => $request->footer_value ?? '',
                'position'=>$request->position ?? 0,
            ];
            $footer->update($data);
            DB::commit();
            Session::flash('success', 'Update thành công');
            return redirect('admin/footers');
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
            Footer::find($id)->delete();
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
