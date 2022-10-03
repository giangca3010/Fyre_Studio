@extends('core-ui.layouts.default')
@section('content')
    <?php if (true) @include('core-ui.components.notification') ?>
    @if (false)
        @include('core-ui.components.notification')
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Update category portfolio</h5>
        </div>
        <div class="card-body">
            <form action="{{route('categoryPortfolio.update', ['id' => $categoryPortfolio->id])}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name EN</label>
                    <input type="text" value="{{ $categoryPortfolio->name_en}}" name="name_en"
                           class="form-control"
                           placeholder="Name EN">
                    <div class="form-text text-danger">
                        {{ $errors->first('name_en') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name VI</label>
                    <input type="text" value="{{ $categoryPortfolio->name_vi}}" name="name_vi"
                           class="form-control"
                           placeholder="Name VI">
                    <div class="form-text text-danger">
                        {{ $errors->first('name_vi') }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Position</label>
                    <input type="text" value="{{ $categoryPortfolio->position  }}" name="position" class="form-control"
                           placeholder="Position">
                    <div class="form-text text-danger">
                        {{ $errors->first('position') }}
                    </div>
                </div>
                <div class="text-end">
                    <a href="{{ asset('/admin/category-portfolios') }}" role="button"
                       class="me-1 btn btn-sm btn-dark">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
