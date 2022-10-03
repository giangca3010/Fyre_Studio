<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Portfolio\PortfolioPostRequest;
use App\Models\CategoryPortfolio;
use App\Models\Portfolio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::orderBy('status', 'desc')->paginate(5);
        return view('core-ui.pages.portfolio.index', ['portfolios' => $portfolios]);
    }

    public function create()
    {
        $category_portfolios = CategoryPortfolio::orderBy('position', 'asc')->get();
        return view('core-ui.pages.portfolio.create', ['category_portfolios'=>$category_portfolios]);

    }

    public function store(PortfolioPostRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'title' => $request->title,
                'desc' => $request->desc,
                'category_portfolio' => $request->category_portfolio,
                'feature_image' => $request->feature_image,
                'status' => $request->status,
                'language' => $request->language,
                'content' => $request->content_value,
            ];
            $data['slug'] = str_slug($request->title);
            Portfolio::create($data);
            Session::flash('success', 'Create thành công');
            DB::commit();
            return redirect()->route('portfolio.index');
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
        $portfolio = Portfolio::find($id);
        $category_portfolios = CategoryPortfolio::orderBy('position', 'asc')->get();
        return view('core-ui.pages.portfolio.update', compact('portfolio', 'category_portfolios'));
    }

    public function update($id, PortfolioPostRequest $request)
    {
        try {
            DB::beginTransaction();
            $portfolio = Portfolio::find($id);

            $data = [
                'title' => $request->title,
                'desc' => $request->desc,
                'category_portfolio' => $request->category_portfolio,
                'feature_image' => $request->feature_image,
                'status' => $request->status,
                'language' => $request->language,
                'content' => $request->content_value,
            ];
            $data['slug'] = str_slug($request->title);
            $portfolio->update($data);
            DB::commit();
            Session::flash('success', 'Update thành công');
            return redirect()->route('portfolio.index');
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
            Portfolio::find($id)->delete();
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
