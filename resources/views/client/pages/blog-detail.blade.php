@extends('client.layouts.default')
@section('content')
    <div class="container mt-100 mb-30">
        <div>{!! $blog->content !!}</div>
    </div>
@endsection
