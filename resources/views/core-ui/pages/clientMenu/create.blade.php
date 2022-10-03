@extends('core-ui.layouts.default')
@section('content')
    <?php if (true) @include('core-ui.components.notification') ?>
    @if (false)
        @include('core-ui.components.notification')
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Create menu</h5>
        </div>
        <div class="card-body">
            <form action="{{route('menu.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên menu EN</label>
                    <input type="text" value="{{ old('name_en') }}" name="name_en" class="form-control"
                           placeholder="Tên menu EN">
                    <div class="form-text text-danger">
                        {{ $errors->first('name_en') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên menu VI</label>
                    <input type="text" value="{{ old('name_vi') }}" name="name_vi" class="form-control"
                           placeholder="Tên menu VI">
                    <div class="form-text text-danger">
                        {{ $errors->first('name_vi') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <select name="is_active" class="form-select" aria-label="Default select example">
                        <option selected>Status</option>
                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Show</option>
                        <option value="2" {{ old('is_active') == 2 ? 'selected' : '' }}>Hide</option>
                    </select>
                    <div class="form-text text-danger">
                        {{ $errors->first('is_active') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Menu cha</label>
                    <select name="parent_id" class="form-select" aria-label="Default select example">
                        <option selected value="0">Chọn làm menu cha</option>
                        @if(isset($clientMenusParent))
                            @foreach($clientMenusParent as $key => $clientMenu)
                                <option
                                    value="{{$clientMenu->id}}">{{$clientMenu->name_en . ' - '. $clientMenu->name_vi}}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="form-text text-danger">
                        {{ $errors->first('parent_id') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Position</label>
                    <input type="text" value="{{ old('position') }}" name="position" class="form-control"
                           placeholder="Position">
                    <div class="form-text text-danger">
                        {{ $errors->first('position') }}
                    </div>
                </div>
                <div class="text-end">
                    <a href="{{ asset('/admin/client-menus') }}" role="button" class="me-1 btn btn-sm btn-dark">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
