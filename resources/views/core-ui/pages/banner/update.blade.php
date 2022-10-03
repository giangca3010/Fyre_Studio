@extends('core-ui.layouts.default')
@section('content')
    <?php if (true) @include('core-ui.components.notification') ?>
    @if (false)
        @include('core-ui.components.notification')
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Create banner</h5>
        </div>
        <div class="card-body">
            <form action="{{route('banner.update', ['id' => $banner->id])}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title banner EN</label>
                    <input type="text" value="{{ $banner->title_en }}" name="title_en" class="form-control"
                           placeholder="Title banner EN">
                    <div class="form-text text-danger">
                        {{ $errors->first('title_en') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title banner VI</label>
                    <input type="text" value="{{ $banner->title_vi }}" name="title_vi" class="form-control"
                           placeholder="Title banner VI">
                    <div class="form-text text-danger">
                        {{ $errors->first('title_vi') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description banner EN</label>
                    <input type="text" value="{{ $banner->desc_en }}" name="desc_en" class="form-control"
                           placeholder="Title banner EN">
                    <div class="form-text text-danger">
                        {{ $errors->first('desc_en') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description banner VI</label>
                    <input type="text" value="{{ $banner->desc_vi }}" name="desc_vi" class="form-control"
                           placeholder="Title banner VI">
                    <div class="form-text text-danger">
                        {{ $errors->first('desc_vi') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description banner VI</label>
                    <div style="width: 290px; height: 210px; cursor: pointer" class="banner_img_upload border p-1">
                        <div class="upload_img {{ $banner->image ? 'd-none' : ''}} bg-dark w-100 h-100 d-flex justify-content-center align-items-center">
                            <h3 class="mb-0 text-white">200x200</h3>
                        </div>
                        <img class="preview_img {{$banner->image ? '' : 'd-none' }} w-100 h-100" src="{{ $banner->image ?? '#'}}" alt="">
                    </div>
                    <input type="text" name="image" value="{{$banner->image}}" class="banner_img invisible">
                </div>


                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <select name="is_featured" class="form-select" aria-label="Default select example">
                        <option value="1" {{ $banner->is_featured == 1 ? 'selected' : '' }}>Show</option>
                        <option value="0" {{ $banner->is_featured == 0 ? 'selected' : '' }}>Hide</option>
                    </select>
                    <div class="form-text text-danger">
                        {{ $errors->first('is_featured') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Position</label>
                    <input type="text" value="{{ $banner->position }}" name="position" class="form-control"
                           placeholder="Position">
                    <div class="form-text text-danger">
                        {{ $errors->first('position') }}
                    </div>
                </div>
                <div class="text-end">
                    <a href="{{ asset('/admin/banners') }}" role="button" class="me-1 btn btn-sm btn-dark">Quay
                        lại</a>
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
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
