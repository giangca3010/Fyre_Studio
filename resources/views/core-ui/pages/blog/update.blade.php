@extends('core-ui.layouts.default')
@section('content')
    <?php if (true) @include('core-ui.components.notification') ?>
    @if (false)
        @include('core-ui.components.notification')
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Update blog</h5>
        </div>
        <div class="card-body">
            <form action="{{route('blog.update', ['id' => $blog->id])}}" method="post">
                @csrf
                <div class="d-flex">
                    <div class="mb-3 me-3">
                        <label for="exampleFormControlInput1" class="form-label">Ảnh box</label>
                        <div style="width: 195px; height: 250px; cursor: pointer" class="upload_image border p-1">
                            <div
                                class="upload_feature_image {{ $blog->feature_image ? 'd-none' : '' }} bg-dark w-100 h-100 d-flex justify-content-center align-items-center">
                                <h3 class="mb-0 text-white">800X989</h3>
                            </div>
                            <img class="preview_feature_image {{ $blog->feature_image ? '' : 'd-none' }} w-100 h-100"
                                 src="{{ $blog->feature_image ?? '#'}}" alt="">
                        </div>
                        <input type="text" name="feature_image" value="{{ $blog->feature_image}}" class="feature_image invisible"
                               style="height: 0">
                        <div class="form-text text-danger">
                            {{ $errors->first('feature_image') }}
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input type="text" value="{{ $blog->title}}" name="title"
                                           class="form-control"
                                           placeholder="Title">
                                    <div class="form-text text-danger">
                                        {{ $errors->first('title') }}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Desciption </label>
                                    <textarea class="form-control" name="desc" id="exampleFormControlTextarea1"
                                              rows="3">{{ $blog->desc}}</textarea>
                                    <div class="form-text text-danger">
                                        {{ $errors->first('desc') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="flex-grow-1 me-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Status </label>
                            <select name="status" class="form-select" aria-label="Default select example">
                                <option selected>Select status</option>
                                <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>Show</option>
                                <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>Hide</option>
                            </select>
                            <div class="form-text text-danger">
                                {{ $errors->first('status') }}
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Language</label>
                                    <select name="language" class="form-select" aria-label="Default select example">
                                        <option selected>Select language</option>
                                        <option value="vi" {{ $blog->language === 'vi' ? 'selected' : '' }}>VI</option>
                                        <option value="en" {{ $blog->language === 'en' ? 'selected' : '' }}>EN</option>
                                    </select>
                                    <div class="form-text text-danger">
                                        {{ $errors->first('language') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Content </label>
                        <textarea class="form-control" name="content_value" id="editor"
                                  rows="3">{{ $blog->content }}</textarea>
                        <div class="form-text text-danger">
                            {{ $errors->first('content_value') }}
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <a href="{{ asset('/admin/blogs') }}" role="button" class="me-1 btn btn-sm btn-dark">Quay
                        lại</a>
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    @include('core-ui.components.ckeditor', ['id'=> 'editor'])

    <script>
        $('.upload_image').click(function () {
            CKFinder.modal({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function (finder) {
                    finder.on('files:choose', function (evt) {
                        var file = evt.data.files.first();
                        var url = file.getUrl();
                        $(".feature_image").val(url);
                        $(".upload_feature_image").addClass('d-none')
                        $(".preview_feature_image").removeClass('d-none').attr("src", url);
                    });
                }
            });
        });
    </script>
@endsection
