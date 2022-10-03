<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\OurTeam\OurTeamPostRequest;
class OurTeamController extends Controller
{
    public function index()
    {
        $ourTeams = OurTeam::orderBy('position', 'asc')->get();
        return view('core-ui.pages.ourTeam.index', ['ourTeams' => $ourTeams]);
    }

    public function create()
    {
        return view('core-ui.pages.ourTeam.create');

    }
    public function store(OurTeamPostRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'avatar' => $request->avatar,
                'name' => $request->name,
                'service'=>$request->service,
                'position'=>$request->position,
            ];
            OurTeam::create($data);
            Session::flash('success', 'Create thành công');
            DB::commit();
            return redirect('/admin/our-teams');
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
        $ourTeam = OurTeam::find($id);

        return view('core-ui.pages.ourTeam.update', compact('ourTeam'));
    }

    public function update($id, OurTeamPostRequest $request)
    {
        try {
            DB::beginTransaction();
            $ourTeam = OurTeam::find($id);

            $data = [
                'avatar' => $request->avatar,
                'name' => $request->name,
                'service' => $request->service,
                'position'=>$request->position ?? 0,
            ];
            $ourTeam->update($data);
            DB::commit();
            Session::flash('success', 'Update thành công');
            return redirect()->route('ourTeam.index');
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
            OurTeam::find($id)->delete();
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
