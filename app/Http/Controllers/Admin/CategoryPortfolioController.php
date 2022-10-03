<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryPortfolio\CategoryPortfolioPostRequest;
use App\Models\CategoryPortfolio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryPortfolioController extends Controller
{
    public function index()
    {
        $categoryPortfolios = CategoryPortfolio::orderBy('position', 'asc')->paginate(10);
        return view('core-ui.pages.categoryPortfolio.index', ['categoryPortfolios' => $categoryPortfolios]);
    }

    public function create()
    {
        return view('core-ui.pages.categoryPortfolio.create');

    }

    public function store(CategoryPortfolioPostRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'name_en' => $request->name_en,
                'name_vi' => $request->name_vi,
                'position' => $request->position,
            ];
            $data['slug'] = str_slug($request->title);
            CategoryPortfolio::create($data);
            Session::flash('success', 'Create thành công');
            DB::commit();
            return redirect()->route('categoryPortfolio.index');
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
        $categoryPortfolio = CategoryPortfolio::find($id);

        return view('core-ui.pages.categoryPortfolio.update', compact('categoryPortfolio'));
    }

    public function update($id, CategoryPortfolioPostRequest $request)
    {
        try {
            DB::beginTransaction();
            $categoryPortfolio = CategoryPortfolio::find($id);

            $data = [
                'name_en' => $request->name_en,
                'name_vi' => $request->name_vi,
                'position' => $request->position,
            ];
            $data['slug'] = str_slug($request->title);
            $categoryPortfolio->update($data);
            DB::commit();
            Session::flash('success', 'Update thành công');
            return redirect()->route('categoryPortfolio.index');
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
            CategoryPortfolio::find($id)->delete();
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
