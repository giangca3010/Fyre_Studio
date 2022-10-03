@extends('client.layouts.default')
@section('content')

    <div class="container mb-20" style="margin-top: 150px">
        <div class="htit sm-mb30">
            <h4>
                @if($language === 'vi')
                    Chúng tôi tin rằng mọi dự án tồn tại trong thế giới kỹ thuật số đều là kết quả của một ý tưởng và mọi ý tưởng đều có nguyên nhân.
                @else
                    We believe that every project existing in digital world is a result of an idea and every idea has a cause.
                @endif
            </h4>
        </div>
    </div>

    <!-- ==================== Start Banner ==================== -->

    <header class="pages-header bg-img valign parallaxie" style="height: 50vh" data-background="{{ $aboutUs->banner }}"
            data-overlay-dark="5">
    </header>

    <!-- ==================== End Banner ==================== -->

    <!-- ==================== Start Intro ==================== -->

    <section class="intro-section section-padding pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="htit sm-mb30">
                        <h4>{{ $aboutUs->{'title_' . $language} }}</h4>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1 col-md-8">
                    <div class="text">
                        <p class="wow txt" data-splitting>{{ $aboutUs->{'desc_' . $language} }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== End Intro ==================== -->

    @include('client.components.services')

    <!-- ==================== Start Minimal-Area ==================== -->

    <section class="min-area sub-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="assets/img">
                        <img class="thumparallax-down" src="{{ $aboutUs->image_about }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 valign mb-20">
                    <div class="content">
                        <h4 class="wow custom-font" data-splitting>{{ $aboutUs->{'about_' . $language} }}</h4>
                        <p class="wow txt" data-splitting>{{ $aboutUs->{'content_' . $language} }}</p>
                        <ul class="feat">
                            @for($i = 0; $i < count(json_decode($aboutUs->{'box_about_' . $language})->title); $i++)
                                <li class="wow fadeInUp" data-wow-delay=".{{ $i + 1 }}s">
                                    <h6><span>{{ $i + 1 }}</span>{{ json_decode($aboutUs->{'box_about_' . $language})->title[$i] }}</h6>
                                    <p>{{ json_decode($aboutUs->{'box_about_' . $language})->content[$i] }}</p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== End Minimal-Area ==================== -->

    @include('client.components.our-teams')
    @include('client.components.our-clients')
    @include('client.components.about-next-project')
@endsection
