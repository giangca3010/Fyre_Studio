<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\Admin\Service\ServicePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('position', 'asc')->get();
        return view('core-ui.pages.service.index', ['services' => $services]);
    }

    public function create()
    {
        return view('core-ui.pages.service.create');

    }
    public function store(ServicePostRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'title_en' => $request->title_en,
                'title_vi'=>$request->title_vi,
                'service_en'=>$request->service_en,
                'service_vi'=>$request->service_vi,
                'icon' => $request->icon,
                'position'=>$request->position ?? 0,
            ];
            Service::create($data);
            Session::flash('success', 'Create thành công');
            DB::commit();
            return redirect()->route('service.index');
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
        $service = Service::find($id);

        return view('core-ui.pages.service.update', compact('service'));
    }

    public function update($id, ServicePostRequest $request)
    {
        try {
            DB::beginTransaction();
            $service = Service::find($id);

            $data = [
                'title_en' => $request->title_en,
                'title_vi'=>$request->title_vi,
                'service_en'=>$request->service_en,
                'service_vi'=>$request->service_vi,
                'icon' => $request->icon,
                'position'=>$request->position,
            ];
            $service->update($data);
            DB::commit();
            Session::flash('success', 'Update thành công');
            return redirect()->route('service.index');
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
            Service::find($id)->delete();
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
