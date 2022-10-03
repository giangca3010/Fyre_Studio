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
            <h5 class="mb-0">List banner</h5>
            <a class="btn btn-sm btn-primary" href="{{route('banner.create')}}" role="button">Create</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered mb-0 align-middle">
                <thead>
                <tr>
                    <th scope="col" class="text-center text-nowrap">STT</th>
                    <th scope="col" class="text-nowrap">Image</th>
                    <th scope="col" class="text-nowrap">Title en</th>
                    <th scope="col" class="text-nowrap">Title en</th>
                    <th scope="col" class="text-nowrap">Slug en</th>
                    <th scope="col" class="text-nowrap">Slug en</th>
                    <th scope="col" class="text-nowrap">Description en</th>
                    <th scope="col" class="text-nowrap">Description en</th>
                    <th scope="col" class="text-center text-nowrap">Status</th>
                    <th scope="col" class="text-center text-nowrap">Position</th>
                    <th scope="col" class="text-nowrap">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($banners))
                    @foreach($banners as $key => $banner)
                        <tr>
                            <th class="text-center" scope="row">{{$key+1}}</th>
                            <td class="text-center ">
                                <img style="width: 120px; height: 140px; cursor: pointer" class="border p-1"
                                     src="{{$banner->image}}">
                            </td>
                            <td>{{$banner->title_en}}</td>
                            <td>{{$banner->title_vi}}</td>
                            <td>{{$banner->slug_en}}</td>
                            <td>{{$banner->slug_vi}}</td>
                            <td>{{$banner->desc_en}}</td>
                            <td>{{$banner->desc_vi}}</td>
                            <td class="text-center">{{$banner->is_featured == 1 ? 'Show' : 'Hide'}}</td>
                            <td class="text-center">{{$banner->position}}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-primary"
                                   href="{{ asset('admin/banners/'. $banner->id .'/edit') }}"
                                   role="button">Sửa</a>
                                <a data-url="{{route('banner.delete', $banner->id)}}"
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
    </div>
@endsection
