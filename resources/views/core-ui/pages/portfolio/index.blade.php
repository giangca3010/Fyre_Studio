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
            <h5 class="mb-0">List portfolio</h5>
            <a class="btn btn-sm btn-primary" href="{{route('portfolio.create')}}" role="button">Create</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered mb-0 align-middle">
                <thead>
                <tr>
                    <th scope="col" class="text-center text-nowrap">STT</th>
                    <th scope="col" class="text-nowrap">Feature Image</th>
                    <th scope="col" class="text-nowrap">Category</th>
                    <th scope="col" class="text-nowrap">Title</th>
                    <th scope="col" class="text-nowrap">Description</th>
                    <th scope="col" class="text-nowrap">Slug</th>
                    <th scope="col" class="text-nowrap">Status</th>
                    <th scope="col" class="text-center text-nowrap">Language</th>
                    <th scope="col" class="text-center text-nowrap">Created At</th>
                    <th scope="col" class="text-nowrap">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($portfolios))
                    @foreach($portfolios as $key => $portfolio)
                        <tr>
                            <th class="text-center" scope="row">{{$key+1}}</th>
                            <td class="text-center ">
                                <img style="width: 120px; height: 140px; cursor: pointer" class="border p-1"
                                     src="{{$portfolio->feature_image}}">
                            </td>
                            <td>{{$portfolio->category_portfolio}}</td>
                            <td>{{$portfolio->title}}</td>
                            <td>{{$portfolio->desc}}</td>
                            <td>{{$portfolio->slug}}</td>
                            <td style="color: {{$portfolio->status == 0 ? 'red' : 'green' }}">{{$portfolio->status == 1 ? 'Show' : 'Hide'}}</td>
                            <td>{{$portfolio->language}}</td>
                            <td class="text-center">{{$portfolio->created_at}}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-primary"
                                   href="{{ asset('admin/portfolios/'. $portfolio->id .'/edit') }}"
                                   role="button">Sửa</a>
                                <a data-url="{{route('portfolio.delete', $portfolio->id)}}"
                                   class="action_delete btn btn-sm btn-danger">
                                    Xoá
                                </a>
                            </td>
                        </tr>
                    @endforeach

                @endif

                </tbody>

            </table>

        </div>
        @if ($portfolios->hasPages())
            <div class="card-footer">
                {{$portfolios->onEachSide(1)->links()}}
            </div>
        @endif
    </div>
@endsection
