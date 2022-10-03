<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9">
                <div class="cont pb-1" style="padding-top: 150px">
                    <h1 class="extra-title mb-10">Blog</h1>
                    <p>
                        @if($language === 'vi')
                            Tất cả các tin tức và sự kiện mới nhất của đội ngũ sáng tạo của chúng tôi.
                        @else
                            All the most current news and events of our creative team.
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-grid sub-bg py-5">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 mb-15">
                    <div class="item list md-mb50 wow fadeInUp" data-wow-delay=".3s">
                        <div class="img">
                            <img src="{{ $blog->feature_image }}" alt="">
                        </div>
                        <div class="cont">
                            <a href="{{ 'blog/' . $blog->slug . '?language=' . $language }}" class="date custom-font">
                                <span><i>{{ $blog->created_at->format('d') }}</i> {{ $blog->created_at->translatedFormat('F') }}</span>
                            </a>
                            <div class="info custom-font">
                                <a href="{{ 'blog/' . $blog->slug . '?language=' . $language }}" class="author">
                                    <span>by / Admin</span>
                                </a>
                                <a href="{{ 'blog/' . $blog->slug . '?language=' . $language }}" class="tag">
                                    <span>WordPress</span>
                                </a>
                            </div>
                            <h6>
                                <a href="{{ 'blog/' . $blog->slug . '?language=' . $language }}">{{ $blog->title }}</a>
                            </h6>
                            <div class="btn-more custom-font">
                                <a href="{{ 'blog/' . $blog->slug . '?language=' . $language }}" class="simple-btn">
                                    @if($language === 'vi')
                                        Đọc thêm
                                    @else
                                        Read More
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$blogs->onEachSide(1)->links('client.components.pagination')}}
    </div>
</section>
