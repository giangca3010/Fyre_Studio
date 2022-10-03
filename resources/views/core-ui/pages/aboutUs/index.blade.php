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
            <h5 class="mb-0">Cấu hình trang "Về chúng tôi"</h5>
        </div>
        <div class="card-body">
            <form action="{{route('aboutUs.update')}}" method="post">
                @csrf

                <div class="d-flex">
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <h5>EN</h5>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title </label>
                                    <input type="text" value="{{ $aboutUs->title_en ?? '' }}" name="title_en"
                                           class="form-control"
                                           placeholder="Title EN">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Desc </label>
                                    <textarea class="form-control" name="desc_en" id="exampleFormControlTextarea1"
                                              rows="3">{{$aboutUs->desc_en ?? ''}}</textarea>
                                </div>

                            </div>
                            <div class="flex-grow-1 mb-3">
                                <div class="mb-3">
                                    <h5>VI</h5>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title </label>
                                    <input type="text" value="{{ $aboutUs->title_vi ?? '' }}" name="title_vi"
                                           class="form-control"
                                           placeholder="Title VI">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Desc </label>
                                    <textarea class="form-control" name="desc_vi" id="exampleFormControlTextarea1"
                                              rows="3">{{$aboutUs->desc_vi ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Banner</label>
                    <div style="width: 485px; height: 323px; cursor: pointer" class="banner_img_upload border p-1">
                        <div
                            class="upload_banner @if(isset($aboutUs->banner))d-none @endif bg-dark w-100 h-100 d-flex justify-content-center align-items-center">
                            <h3 class="mb-0 text-white">1920x1280</h3>
                        </div>
                        <img class="preview_banner @if(empty($aboutUs->banner))d-none @endif w-100 h-100" src="{{ $aboutUs->banner ?? '#'}}" alt="">
                    </div>
                    <input type="text" name="banner" value="{{$aboutUs->banner ?? ''}}" class="banner invisible" style="height: 0">
                </div>

                <div class="d-flex">
                    <div class="mb-3 me-3">
                        <label for="exampleFormControlInput1" class="form-label">Ảnh box</label>
                        <div style="width: 485px; height: 485px; cursor: pointer" class="image_upload border p-1">
                            <div
                                class="upload_img @if(isset($aboutUs->image_about))d-none @endif bg-dark w-100 h-100 d-flex justify-content-center align-items-center">
                                <h3 class="mb-0 text-white">800X989</h3>
                            </div>
                            <img class="preview_img @if(empty($aboutUs->image_about))d-none @endif w-100 h-100" src="{{ $aboutUs->image_about ?? '#'}}" alt="">
                        </div>
                        <input type="text" name="image" value="{{$aboutUs->image_about ?? ''}}" class="image invisible" style="height: 0">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <h5>EN</h5>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">About-us name</label>
                                    <input type="text" value="{{ $aboutUs->about_en ?? '' }}" name="about_en"
                                           class="form-control"
                                           placeholder="Content EN">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">About-us content </label>
                                    <textarea class="form-control" name="content_en" id="exampleFormControlTextarea1"
                                              rows="3">{{ $aboutUs->content_en ?? '' }}</textarea>
                                </div>
                                @for ($key = 1, $boxAboutEN = json_decode($aboutUs->box_about_en ?? ''); $key <= 3; $key++)
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Title {{$key}}</label>
                                        <input type="text" value="{{ $boxAboutEN->title[$key-1] ?? '' }}" name="title_box_en[]"
                                               class="form-control"
                                               placeholder="Title  EN">
                                        <div class="form-text text-danger">
                                            {{ $errors->first('title_box_en') }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Content {{$key}}</label>
                                        <textarea class="form-control" name="content_box_en[]"
                                                  id="exampleFormControlTextarea1"
                                                  rows="3">{{ $boxAboutEN->content[$key-1] ?? '' }}</textarea>
                                    </div>
                                @endfor

                            </div>
                            <div class="flex-grow-1 mb-3">
                                <div class="mb-3">
                                    <h5>VI</h5>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">About-us name</label>
                                    <input type="text" value="{{ $aboutUs->about_vi ?? '' }}" name="about_vi"
                                           class="form-control"
                                           placeholder="Content VI">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">About-us content</label>
                                    <textarea class="form-control" name="content_vi" id="exampleFormControlTextarea1"
                                              rows="3">{{ $aboutUs->content_vi ?? '' }}</textarea>
                                </div>
                                @for ($key = 1, $boxAboutVI = json_decode($aboutUs->box_about_vi ?? ''); $key <= 3; $key++)
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Title {{$key}}
                                            </label>
                                        <input type="text" value="{{ $boxAboutVI->title[$key-1] ?? ''}}" name="title_box_vi[]"
                                               class="form-control"
                                               placeholder="Title  VI">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Content {{$key}}</label>
                                        <textarea class="form-control" name="content_box_vi[]"
                                                  id="exampleFormControlTextarea1"
                                                  rows="3">{{ $boxAboutVI->content[$key-1] ?? ''}}</textarea>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
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
                        $(".banner").val(url);
                        $(".upload_banner").addClass('d-none')
                        $(".preview_banner").removeClass('d-none').attr("src", url);
                    });
                }
            });
        });
        $('.image_upload').click(function () {
            CKFinder.modal({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function (finder) {
                    finder.on('files:choose', function (evt) {
                        var file = evt.data.files.first();
                        var url = file.getUrl();
                        $(".image").val(url);
                        $(".upload_img").addClass('d-none')
                        $(".preview_img").removeClass('d-none').attr("src", url);
                    });
                }
            });
        });
    </script>


@endsection
