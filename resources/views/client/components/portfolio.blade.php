<section class="portfolio section-padding pb-70">
    <div class="container">
        <div class="sec-head custom-font">
            <h6>Portfolio</h6>
            <h3>Our Works.</h3>
            <span class="tbg text-right">Portfolio</span>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

            <!-- filter links -->
            <div class="filtering text-center col-12">
                <div class="filter">
                    <span data-filter='*' class="active">All</span>
                    @foreach($categoryPortfolios as $categoryPortfolio)
                        <span data-filter='.categoryPortfolio{{ $categoryPortfolio->id }}'>{{ $categoryPortfolio->{'name_' . $language} }}</span>
                    @endforeach
                </div>
            </div>

            <!-- gallery -->
            <div class="gallery full-width">
                <!-- gallery item -->
                @foreach($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 items categoryPortfolio{{ $portfolio->category->id }} wow fadeInUp"
                         data-wow-delay=".4s">
                        <div class="item-img">
                            <a href="{{ 'portfolio/' . $portfolio->slug . '?language=' . $language }}"
                               class="imago wow">
                                <img src="{{$portfolio->feature_image}}" alt="image">
                                <div class="item-img-overlay"></div>
                            </a>
                        </div>
                        <div class="cont">
                            <h6>{{$portfolio->title}}</h6>
                            <span><a href="{{ 'portfolio/' . $portfolio->slug . '?language=' . $language }}">Design</a>, <a
                                        href="{{ 'portfolio/' . $portfolio->slug . '?language=' . $language }}">WordPress</a></span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>