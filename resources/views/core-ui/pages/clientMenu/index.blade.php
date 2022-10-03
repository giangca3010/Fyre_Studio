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
            <h5 class="mb-0">List menu</h5>
            <a class="btn btn-sm btn-primary" href="{{route('menu.create')}}" role="button">Create</a>
        </div>
        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead>
                <tr>
                    <th scope="col" class="text-center text-nowrap">STT</th>
                    <th scope="col" class="text-nowrap">Tên menu EN</th>
                    <th scope="col" class="text-nowrap">Tên menu VI</th>
                    <th scope="col" class="text-nowrap">Đường dẫn EN</th>
                    <th scope="col" class="text-nowrap">Đường dẫn VI</th>
                    <th scope="col" class="text-nowrap">Status</th>
                    <th scope="col" class="text-nowrap">Loại menu</th>
                    <th scope="col" class="text-center text-nowrap">Thứ tự hiển thị</th>
                    <th scope="col" class="text-nowrap">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($clientMenus))
                    @foreach($clientMenus as $key => $clientMenu)
                        <tr class="table-primary">
                            <th class="text-center" scope="row">{{$key+1}}</th>
                            <td>{{$clientMenu->name_en}}</td>
                            <td>{{$clientMenu->name_vi}}</td>
                            <td>{{$clientMenu->slug_en}}</td>
                            <td>{{$clientMenu->slug_vi}}</td>
                            <td style="color: {{$clientMenu->is_active != 1 ? 'red': '' }}">
                                {{$clientMenu->is_active == 1 ? 'Show' : 'Hide'}}
                            </td>
                            <td>{{$clientMenu->parent_id == 0 ? 'Cấp 1': 'Cấp 2'}}</td>
                            <td class="text-center">{{$clientMenu->position}}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-primary"
                                   href="{{ asset('admin/client-menus/'. $clientMenu->id .'/edit') }}"
                                   role="button">Sửa</a>
                                <a data-url="{{route('menu.delete', $clientMenu->id)}}"
                                   class="action_delete btn btn-sm btn-danger">
                                    Xoá
                                </a></td>
                        </tr>
                        @foreach($clientMenu->menuChilderen as $menuChil)
                            <tr class="table-light">
                                <th scope="row"></th>
                                <td>{{$menuChil->name_en}}</td>
                                <td>{{$menuChil->name_vi}}</td>
                                <td>{{$menuChil->slug_en}}</td>
                                <td>{{$menuChil->slug_vi}}</td>
                                <td style="color: {{$clientMenu->is_active != 1 ? 'red': '' }}">
                                {{$clientMenu->is_active == 1 ? 'Show' : 'Hide'}}
                                <td>{{$menuChil->parent_id == 0 ? 'Cấp 1': 'Cấp 2'}}</td>
                                <td class="text-center">{{$menuChil->position}}</td>
                                <td class="text-nowrap">
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ asset('admin/client-menus/'. $menuChil->id .'/edit') }}" role="button">Sửa</a>
                                    <a data-url="{{route('menu.delete', $menuChil->id)}}"
                                       class="action_delete btn btn-sm btn-danger">
                                        Xoá
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        @if ($clientMenus->hasPages())
            <div class="card-footer">
                {{$clientMenus->onEachSide(1)->links()}}
            </div>
        @endif
    </div>
@endsection
