<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientMenu;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ClientMenu\ClientMenuPostRequest;
use App\Http\Requests\Admin\ClientMenu\ClientMenuUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClientMenuController extends Controller
{
    public function index()
    {
        $limit = $request->limit ?? 10;
        $clientMenus = ClientMenu::where('parent_id', 0)
            ->orderBy('position', 'asc')
            ->paginate($limit);
        return view('core-ui.pages.clientMenu.index', compact('clientMenus'));
    }

    public function create()
    {
        $clientMenusParent = ClientMenu::where('parent_id', 0)
            ->orderBy('position', 'asc')
            ->get();
        return view('core-ui.pages.clientMenu.create', compact('clientMenusParent'));
    }

    public function store(ClientMenuPostRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                'name_en' => $request->name_en,
                'name_vi' => $request->name_vi,
                'is_active' => $request->is_active,
                'icon' => $request->icon,
                'parent_id' => $request->parent_id,
                'position' => $request->position,
            ];
            $data['slug_en'] = str_slug($request->name_en);
            $data['slug_vi'] = str_slug($request->slug_vi);
            ClientMenu::create($data);
            DB::commit();
            Session::flash('success', 'Thêm mới thành công');
            return redirect('admin/client-menus');
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
        $clientMenu = ClientMenu::find($id);
        $clientMenusParent = ClientMenu::where('parent_id', 0)
            ->orderBy('position', 'asc')
            ->get();
        return view('core-ui.pages.clientMenu.update', compact('clientMenu', 'clientMenusParent'));
    }

    public function update($id, ClientMenuUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $clientMenu = ClientMenu::find($id);

            $data = [
                'name_en' => $request->name_en,
                'name_vi' => $request->name_vi,
                'is_active' => $request->is_active,
                'icon' => $request->icon,
                'parent_id' => $request->parent_id,
                'position' => $request->position,
            ];
            $data['slug_en'] = str_slug($request->name_en);
            $data['slug_vi'] = str_slug($request->name_vi);
            $clientMenu->update($data);
            DB::commit();
            Session::flash('success', 'Update thành công');
            return redirect('admin/client-menus');
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
            ClientMenu::find($id)->delete();
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
