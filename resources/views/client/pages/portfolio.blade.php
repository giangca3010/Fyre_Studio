@extends('client.layouts.default', ['isNavi' => true, 'noFooter' => true])
@section('content')
    <div class="portfolio">
        {{--<div class="filtering text-center col-12 position-absolute" style="top: 120px; z-index: 999">
            <div class="filter">
                <span data-filter='*' class="active">All</span>
                <span data-filter='.brand'>Branding</span>
                <span data-filter='.web'>Mobile App</span>
                <span data-filter='.graphic'>Creative</span>
            </div>
        </div>--}}
        <header class="slider showcase-carus" data-carousel="swiper" data-items="2" data-loop="true" data-speed="1000"
                data-space="200" data-mousewheel="true" data-center="true">
            <div id="content-carousel-container-unq-1" class="swiper-container" data-swiper="container">
                <div class="swiper-wrapper">
                    @foreach($portfolios as $portfolio)
                        <div class="swiper-slide">
                            <div class="bg-img valign" data-background="{{ $portfolio->feature_image }}"
                                 data-overlay-dark="1">
                                <div class="caption ontop">
                                    <div class="o-hidden">
                                        <h1>
                                            <a href="{{ 'portfolio/' . $portfolio->slug . '?language=' . $language }}">
                                                <div class="stroke">Hoodie</div>
                                                <span>Jacket</span>
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                                <div class="copy-cap valign">
                                    <div class="cap">
                                        <h1>
                                            <a href="{{ 'portfolio/' . $portfolio->slug . '?language=' . $language }}">
                                                <div class="stroke">Hoodie</div>
                                                <span>Jacket</span>
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- slider setting -->
                <div class="txt-botm">
                    <div class="swiper-button-next swiper-nav-ctrl cursor-pointer">
                        <div>
                            <span class=" custom-font">Next Slide</span>
                        </div>
                        <div><i class="fas fa-chevron-right"></i></div>
                    </div>
                    <div class="swiper-button-prev swiper-nav-ctrl cursor-pointer">
                        <div><i class="fas fa-chevron-left"></i></div>
                        <div>
                            <span class=" custom-font">Prev Slide</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
@endsection
