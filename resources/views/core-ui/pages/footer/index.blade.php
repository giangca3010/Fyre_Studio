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
            <h5 class="mb-0">Cấu hình "Footer"</h5>
            <a class="btn btn-sm btn-primary" href="{{route('footer.create')}}" role="button">Create</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered mb-0 align-middle">
                <thead>
                <tr>
                    <th scope="col" class="text-center text-nowrap">STT</th>
                    <th scope="col" class="text-nowrap">Footer key</th>
                    <th scope="col" class="text-nowrap">Footer value</th>
                    <th scope="col" class="text-center text-nowrap">Thứ tự</th>
                    <th scope="col" class="text-nowrap">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($footers))
                    @foreach($footers as $key => $footer)
                        <tr>
                            <th class="text-center" scope="row">{{$key+1}}</th>
                            <td>{{$footer->footer_key}}</td>
                            <td>{{$footer->footer_value}}</td>
                            <td>{{$footer->position}}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-primary"
                                   href="{{ asset('admin/footers/'. $footer->id .'/edit') }}"
                                   role="button">Sửa</a>
                                <a data-url="{{route('footer.delete', $footer->id)}}"
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
