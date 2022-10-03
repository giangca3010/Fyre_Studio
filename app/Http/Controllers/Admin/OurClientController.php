<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OurClient\OurClientPostRequest;
use App\Models\OurClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OurClientController extends Controller
{
    public function index()
    {
        $ourClients = OurClient::get();
        return view('core-ui.pages.ourClient.index', ['ourClients' => $ourClients]);
    }

    public function update($id, OurClientPostRequest $request)
    {
        try {
            DB::beginTransaction();
            $ourClient = OurClient::find($id);

            $data = [
                'avatar' => $request->avatar,
                'name' => $request->name,
                'service' => $request->service,
                'position'=>$request->position ?? 0,
            ];
            $ourClient->update($data);
            DB::commit();
            Session::flash('success', 'Update thành công');
            return redirect()->route('ourClient.index');
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

}
