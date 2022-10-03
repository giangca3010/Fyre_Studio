<section class="blc-sec section-padding pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="intro md-mb30">
                    <div class="sub-title">
                        <h6>
                            @if($language === 'vi')
                                BIẾT CHÚNG TÔI TỐT HƠN
                            @else
                                Know Us Better
                            @endif
                        </h6>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <h2 class="extra-title wow" data-splitting>{{ $aboutUs->{'title_' . $language} }}</h2>
                </div>
            </div>
            <div class="col-lg-5 valign">
                <div class="full-width">
                    <p class="wow txt" data-splitting>{{ $aboutUs->{'desc_' . $language} }}</p>
                    <a href="{{ 'about-us?language=' . $language }}" class="simple-btn custom-font mt-20 wow" data-splitting>
                        <span>
                            @if($language === 'vi')
                                Xem thêm
                            @else
                                Know More
                            @endif
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>