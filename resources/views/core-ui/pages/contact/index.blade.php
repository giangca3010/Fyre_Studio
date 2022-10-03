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
            <h5 class="mb-0">Cấu hình trang "Liên hệ"</h5>
        </div>
        <div class="card-body">
            <form action="{{route('contact.update')}}" method="post">
                @csrf

                <div class="d-flex">
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <h5>EN</h5>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Contact name</label>
                                    <input type="text" value="{{ $contact->contact_en ?? '' }}" name="contact_en"
                                           class="form-control"
                                           placeholder="Title EN">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title </label>
                                    <input type="text" value="{{ $contact->title_en ?? '' }}" name="title_en"
                                           class="form-control"
                                           placeholder="Title EN">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Desc </label>
                                    <textarea class="form-control" name="desc_en" id="exampleFormControlTextarea1"
                                              rows="3">{{$contact->desc_en ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="flex-grow-1 mb-3">
                                <div class="mb-3">
                                    <h5>VI</h5>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Contact name</label>
                                    <input type="text" value="{{ $contact->contact_vi ?? '' }}" name="contact_vi"
                                           class="form-control"
                                           placeholder="Title VI">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title </label>
                                    <input type="text" value="{{ $contact->title_vi ?? '' }}" name="title_vi"
                                           class="form-control"
                                           placeholder="Title VI">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Desc </label>
                                    <textarea class="form-control" name="desc_vi" id="exampleFormControlTextarea1"
                                              rows="3">{{$contact->desc_vi ?? ''}}</textarea>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="flex-grow-1">
                        <div class="flex-grow-1 me-3">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Latitude </label>
                                <input type="number" value="{{ $contact->latitude ?? '' }}" name="latitude"
                                       class="form-control"
                                       placeholder="Latitude">
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="mb-3">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Longitude </label>
                                <input type="number" value="{{ $contact->longitude ?? '' }}" name="longitude"
                                       class="form-control"
                                       placeholder="Longitude">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <h5>EN</h5>
                                </div>
                                @for ($key = 1, $boxContactEN = json_decode($contact->box_contact_en ?? ''); $key <= 2; $key++)

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Box {{$key}}</label>
                                        <input type="text" value="{{ $boxContactEN->box_name[$key-1]  ?? '' }}"
                                               name="box_title_en[]"
                                               class="form-control"
                                               placeholder="Title EN">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Contact {{$key}}
                                        </label>
                                        <input type="text" value="{{ $boxContactEN->box_value[$key-1] ?? '' }}"
                                               name="contact_value_en[]"
                                               class="form-control"
                                               placeholder="Title">
                                    </div>

                                @endfor

                            </div>
                            <div class="flex-grow-1 mb-3">
                                <div class="mb-3">
                                    <h5>VI</h5>
                                </div>
                                @for ($key = 1, $boxContactVI = json_decode($contact->box_contact_vi ?? ''); $key <= 2; $key++)

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Box {{$key}}</label>
                                        <input type="text"
                                               value="{{ $boxContactVI->box_name[$key-1] ?? '' }}"
                                               name="box_title_vi[]"
                                               class="form-control"
                                               placeholder="Title  VI">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Contact {{$key}}
                                        </label>
                                        <input type="text" value="{{ $boxContactVI->box_value[$key-1] ?? '' }}"
                                               name="contact_value_vi[]"
                                               class="form-control"
                                               placeholder="Title">
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
        $('.upload_banner').click(function () {
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
        $('.upload_img').click(function () {
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
