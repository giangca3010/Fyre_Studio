@extends('core-ui.layouts.default')
@section('content')
    @if (session('success'))
        @include('core-ui.components.notification',['message' => session('success'), 'status'=>'success'])
    @endif
    @if (session('error'))
        @include('core-ui.components.notification',['message' => session('error'), 'status'=>'error'])
    @endif

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">List category portfolio</h5>
            <a class="btn btn-sm btn-primary" href="{{route('categoryPortfolio.create')}}" role="button">Create</a>
        </div>
        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead>
                <tr>
                    <th scope="col" class="text-center text-nowrap">STT</th>
                    <th scope="col" class="text-nowrap">Name EN</th>
                    <th scope="col" class="text-nowrap">Name VI</th>
                    <th scope="col" class="text-center text-nowrap">Position</th>
                    <th scope="col" class="text-nowrap">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($categoryPortfolios))
                    @foreach($categoryPortfolios as $key => $category)
                        <tr class="table-primary">
                            <th class="text-center" scope="row">{{$key+1}}</th>
                            <td>{{$category->name_en}}</td>
                            <td>{{$category->name_vi}}</td>
                            <td class="text-center">{{$category->position}}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-primary"
                                   href="{{ asset('admin/category-portfolios/'. $category->id .'/edit') }}"
                                   role="button">Sửa</a>
                                <a data-url="{{route('categoryPortfolio.delete', $category->id)}}"
                                   class="action_delete btn btn-sm btn-danger">
                                    Xoá
                                </a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        @if ($categoryPortfolios->hasPages())
            <div class="card-footer">
                {{$categoryPortfolios->onEachSide(1)->links()}}
            </div>
        @endif
    </div>
@endsection
