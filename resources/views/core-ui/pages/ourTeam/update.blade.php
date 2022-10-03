@extends('core-ui.layouts.default')
@section('content')
    <?php if (session('success')) @include('core-ui.components.notification') ?>
    @if (session('success'))
        @include('core-ui.components.notification')
    @endif

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Update "Our Team"</h5>
        </div>
        <div class="card-body">
            <form action="{{route('ourTeam.update', ['id'=>$ourTeam->id])}}" method="post">
                @csrf
                <div class="d-flex">
                    <div class="flex-grow-1 box-ourTeam">
                        <div class="d-flex">
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name </label>
                                    <input type="text" value="{{  $ourTeam->name ?? '' }}" name="name"
                                           class="form-control"
                                           placeholder="Name">
                                    <div class="form-text text-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Position </label>
                                    <input type="text" value="{{  $ourTeam->service ?? '' }}" name="service"
                                           class="form-control"
                                           placeholder="Position">
                                    <div class="form-text text-danger">
                                        {{ $errors->first('service') }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 me-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Sort </label>
                                    <input type="number" value="{{  $ourTeam->position ?? '' }}" name="position"
                                           class="form-control"
                                           placeholder="Sort">
                                    <div class="form-text text-danger">
                                        {{ $errors->first('position') }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Avatar</label>
                    <div style="width: 300px; height: 377px; cursor: pointer" class="avatar_upload border p-1">
                        <div class="upload_img {{ $ourTeam->avatar ? 'd-none' : ''}} bg-dark w-100 h-100 d-flex justify-content-center align-items-center">
                            <h3 class="mb-0 text-white">601x737</h3>
                        </div>
                        <img class="preview_img {{$ourTeam->avatar ? '' : 'd-none'}} w-100 h-100" src="{{ $ourTeam->avatar ?? '#'}}" alt="">
                    </div>
                    <input type="text" name="avatar" value="{{$ourTeam->avatar}}" class="avatar_img invisible">
                    <div class="form-text text-danger">
                        {{ $errors->first('avatar') }}
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>

    </div>
    <script>
        $('.avatar_upload').click(function () {
            CKFinder.modal({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function (finder) {
                    finder.on('files:choose', function (evt) {
                        var file = evt.data.files.first();
                        var url = file.getUrl();
                        $(".avatar_img").val(url);
                        $(".upload_img").addClass('d-none')
                        $(".preview_img").removeClass('d-none').attr("src", url);
                    });
                }
            });
        });
    </script>

@endsection
