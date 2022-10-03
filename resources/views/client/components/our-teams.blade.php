<section class="team section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 valign">
                <div class="full-width">
                    <div class="sec-head custom-font mb-0">
                        <h6>Employees</h6>
                        <h3>Our Team.</h3>
                    </div>
                    <div class="navs mt-30 wow fadeInUp" data-wow-delay=".3s">
                            <span class="prev cursor-pointer">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        <span class="next cursor-pointer">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="team-container">
                    @foreach($ourTeams as $ourTeam)
                        <div class="item wow fadeInUp" data-wow-delay=".3s">
                            <div class="assets/img wow imago">
                                <img src="{{ $ourTeam->avatar }}" alt="">
                            </div>
                            <div class="info">
                                <h5>{{ $ourTeam->name }}</h5>
                                <span>{{ $ourTeam->service }}</span>
                                <div class="social">
                                    <a href="{{ asset('#0') }}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{ asset('#0') }}"><i class="fab fa-twitter"></i></a>
                                    <a href="{{ asset('#0') }}"><i class="fab fa-behance"></i></a>
                                    <a href="{{ asset('#0') }}"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>