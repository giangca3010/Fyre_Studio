@extends('core-ui.layouts.default')
@section('content')
    <?php if (session('success')) @include('core-ui.components.notification') ?>
    @if (session('success'))
        @include('core-ui.components.notification')
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Create</h5>
        </div>
        <div class="card-body">
            <form action="{{route('banner.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title EN</label>
                    <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control"
                           placeholder="Title EN">
                    <div class="form-text text-danger">
                        {{ $errors->first('title_en') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title VI</label>
                    <input type="text" value="{{ old('title_vi') }}" name="title_vi" class="form-control"
                           placeholder="Title VI">
                    <div class="form-text text-danger">
                        {{ $errors->first('title_vi') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description EN</label>
                    <input type="text" value="{{ old('desc_en') }}" name="desc_en" class="form-control"
                           placeholder="Title EN">
                    <div class="form-text text-danger">
                        {{ $errors->first('desc_en') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description VI</label>
                    <input type="text" value="{{ old('desc_vi') }}" name="desc_vi" class="form-control"
                           placeholder="Title VI">
                    <div class="form-text text-danger">
                        {{ $errors->first('desc_vi') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description VI</label>
                    <div style="width: 290px; height: 210px; cursor: pointer" class="banner_img_upload border p-1">
                        <div class="upload_img {{ old('image') ? 'd-none' : ''}} bg-dark w-100 h-100 d-flex justify-content-center align-items-center">
                            <h3 class="mb-0 text-white">200x200</h3>
                        </div>
                        <img class="preview_img d-none w-100 h-100" src="{{ old('image') ?? '#'}}" alt="">
                    </div>
                    <input type="text" name="image" class="banner_img invisible">
                </div>


                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <select name="is_featured" class="form-select" aria-label="Default select example">
                        <option selected>Status</option>
                        <option value="1" {{ old('is_featured') == 1 ? 'selected' : '' }}>Show</option>
                        <option value="2" {{ old('is_featured') == 0 ? 'selected' : '' }}>Hide</option>
                    </select>
                    <div class="form-text text-danger">
                        {{ $errors->first('is_featured') }}
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
                    <a href="{{ asset('/admin/client-banners') }}" role="button" class="me-1 btn btn-sm btn-dark">Quay
                        lại</a>
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('.banner_img_upload').click(function () {
            CKFinder.modal({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function (finder) {
                    finder.on('files:choose', function (evt) {
                        var file = evt.data.files.first();
                        var url = file.getUrl();
                        $(".banner_img").val(url);
                        $(".upload_img").addClass('d-none')
                        $(".preview_img").removeClass('d-none').attr("src", url);
                    });
                }
            });
        });
    </script>
@endsection
