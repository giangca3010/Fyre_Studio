@extends('client.layouts.default')
@section('content')
    <div class="container mt-100 mb-30">
        <div>{!! $portfolio->content !!}</div>
    </div>
@endsection
