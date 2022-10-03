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
            <h5 class="mb-0">Quản lý "OurTeam"</h5>
            <a class="btn btn-sm btn-primary" href="{{route('ourTeam.create')}}" role="button">Create</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered mb-0 align-middle">
                <thead>
                <tr>
                    <th scope="col" class="text-center text-nowrap">STT</th>
                    <th scope="col" class="text-center text-nowrap">Avatar</th>
                    <th scope="col" class="text-nowrap">Name</th>
                    <th scope="col" class="text-nowrap">Position</th>
                    <th scope="col" class="text-center text-nowrap">Sort</th>
                    <th scope="col" class="text-center text-nowrap">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($ourTeams))
                    @foreach($ourTeams as $key => $ourTeam)
                        <tr>
                            <th class="text-center" scope="row">{{$key+1}}</th>
                            <td class="text-center ">
                                <img style="width: 120px; height: 140px; cursor: pointer" class="border p-1"
                                     src="{{$ourTeam->avatar}}">
                            </td>
                            <td>{{$ourTeam->name}}</td>
                            <td>{{$ourTeam->service}}</td>
                            <td>{{$ourTeam->position}}</td>
                            <td class="text-center text-nowrap">
                                <a class="btn btn-sm btn-primary"
                                   href="{{ route('ourTeam.edit', ['id'=>$ourTeam->id]) }}"
                                   role="button">Sửa</a>
                                <a data-url="{{route('ourTeam.delete', $ourTeam->id)}}"
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
