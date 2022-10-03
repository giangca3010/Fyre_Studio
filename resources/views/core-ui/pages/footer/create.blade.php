@extends('core-ui.layouts.default')
@section('content')
    <?php if (session('success')) @include('core-ui.components.notification') ?>
    @if (session('success'))
        @include('core-ui.components.notification')
    @endif

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Thêm mới "Footer"</h5>
        </div>
        <div class="card-body">
            <form action="{{route('footer.store')}}" method="post">
                @csrf
                <div class="d-flex">
                    <div class="flex-grow-1 box-footer">
                        <div class="d-flex">
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Footer key </label>
                                    <input type="text" value="{{ old('footer_key') ?? '' }}" name="footer_key"
                                           class="form-control"
                                           placeholder="Footer key">
                                </div>
                            </div>
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Footer key </label>
                                    <input type="text" value="{{  old('footer_value') ?? '' }}" name="footer_value"
                                           class="form-control"
                                           placeholder="Footer value">
                                </div>
                            </div>
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Footer position </label>
                                    <input type="number" value="{{  old('position') ?? '' }}" name="position"
                                           class="form-control"
                                           placeholder="Footer position">
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
