<header class="slider slider-prlx">
    <div class="swiper-container parallax-slider">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
                <div class="swiper-slide" data-swiper-autoplay="10000">
                    <div class="bg-img valign" data-background="{{ $banner->image }}"
                         data-overlay-dark="6">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="caption dig">
                                        <h1 data-splitting>
                                            {{ $banner->{'title_' . $language} }}
                                            {{--                                        <div class="tline">brand Stories</div>--}}
                                        </h1>
                                        <a href="{{ $banner->{'slug_' . $language} }}" class="simple-btn mt-50">
                                            <span>{{ $banner->{'desc_' . $language} }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- slider setting -->
        <div class="setone setwo">
            <div class="swiper-button-next swiper-nav-ctrl next-ctrl cursor-pointer">
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer">
                <i class="fas fa-chevron-left"></i>
            </div>
        </div>
        <div class="swiper-pagination top botm custom-font"></div>

        <div class="social-icon">
            <a href="{{ asset('#0') }}"><i class="fab fa-facebook-f"></i></a>
            <a href="{{ asset('#0') }}"><i class="fab fa-twitter"></i></a>
            <a href="{{ asset('#0') }}"><i class="fab fa-behance"></i></a>
            <a href="{{ asset('#0') }}"><i class="fab fa-pinterest-p"></i></a>
        </div>
    </div>
</header>
