@extends('core-ui.layouts.default')
@section('content')
    <?php if (session('success')) @include('core-ui.components.notification') ?>
    @if (session('success'))
        @include('core-ui.components.notification')
    @endif

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Thêm mới "Service"</h5>
        </div>
        <div class="card-body">
            <form action="{{route('service.store')}}" method="post">
                @csrf

                <div class="d-flex">
                    <div class="flex-grow-1 box-service">
                        <div class="d-flex">

                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                   <h5>EN</h5>
                                </div>
                            </div>
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                   <h5>VI</h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="flex-grow-1 box-service">
                        <div class="d-flex">
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title </label>
                                    <input type="text" value="{{  old('title_en') ?? '' }}" name="title_en"
                                           class="form-control"
                                           placeholder="Title">
                                    <div class="form-text text-danger">
                                        {{ $errors->first('title_en') }}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Services </label>
                                    <textarea class="form-control" name="service_en" id="exampleFormControlTextarea1"
                                              rows="3">{{old('service_en')}}</textarea>
                                    <div class="form-text text-danger">
                                        {{ $errors->first('service_en') }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title </label>
                                    <input type="text" value="{{  old('title_vi') ?? '' }}" name="title_vi"
                                           class="form-control"
                                           placeholder="Title vi">
                                    <div class="form-text text-danger">
                                        {{ $errors->first('title_vi') }}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Services </label>
                                    <textarea class="form-control" name="service_vi" id="exampleFormControlTextarea1"
                                              rows="3">{{ old('service_vi') }}</textarea>
                                    <div class="form-text text-danger">
                                        {{ $errors->first('service_vi') }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="flex-grow-1 box-service">
                        <div class="d-flex">
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Icon </label>
                                    <input type="text" value="{{  old('icon') ?? '' }}" name="icon"
                                           class="form-control"
                                           placeholder="Icon">
                                </div>
                            </div>
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Position </label>
                                    <input type="number" value="{{  old('position') ?? '' }}" name="position"
                                           class="form-control"
                                           placeholder="Position">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>

    </div>
@endsection
