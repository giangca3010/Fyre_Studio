<section class="services section-padding" style="padding-bottom: 85px">
    <div class="container">
        <div class="row">
            @foreach($services as $index => $service)
                <div class="col-lg-3 mb-35">
                    <div class="item md-mb50 wow fadeInUp text-left" style="padding: 30px" data-wow-delay=".{{ ($index + 1) }}s">
                        <span class="icon pe-7s-gleam mb-20"></span>
                        <h6>{{ $service->{'title_' . $language} }}</h6>
                        @foreach(explode(';', $service->{'service_' . $language}) as $title)
                            <p>{{$title}}</p>
                        @endforeach
                        <div class="text-right mt-20">
                            <a href="#0" class="more"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>