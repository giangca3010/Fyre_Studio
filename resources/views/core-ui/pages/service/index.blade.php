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
            <h5 class="mb-0">Quản lý "Service"</h5>
            <a class="btn btn-sm btn-primary" href="{{route('service.create')}}" role="button">Create</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered mb-0 align-middle">
                <thead>
                <tr>
                    <th scope="col" class="text-center text-nowrap">STT</th>
                    <th scope="col" class="text-center text-nowrap">Icon - Image</th>
                    <th scope="col" class="text-nowrap">Title EN</th>
                    <th scope="col" class="text-nowrap">Title VI</th>
                    <th scope="col" class="text-nowrap">Service EN</th>
                    <th scope="col" class="text-nowrap">Service VI</th>
                    <th scope="col" class="text-center text-nowrap">Position</th>
                    <th scope="col" class="text-center text-nowrap">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($services))
                    @foreach($services as $key => $service)
                        <tr>
                            <th class="text-center" scope="row">{{$key+1}}</th>
                            <td class="text-center">
                                {{$service->icon}}

                            </td>
                            <td>{{$service->title_en}}</td>
                            <td>{{$service->title_vi}}</td>
                            <td>
                                @foreach(explode(';', $service->service_en) as $service_en)
                                    <span>{{$service_en}}</span><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach(explode(';', $service->service_vi) as $service_vi)
                                    <span>{{$service_vi}}</span><br>
                                @endforeach
                            </td>
                            <td class="text-center">
                                {{$service->position}}
                            </td>
                            <td class="text-center text-nowrap">
                                <a class="btn btn-sm btn-primary"
                                   href="{{ route('service.edit', ['id'=>$service->id]) }}"
                                   role="button">Sửa</a>
                                <a data-url="{{route('service.delete', $service->id)}}"
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
