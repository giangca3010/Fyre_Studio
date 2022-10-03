<footer class="footer-half sub-bg section-padding pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="cont">
                    <div class="logo">
                        <a href="{{ asset('#0') }}">
                            <img src="{{ asset('assets/img/logo-light.png') }}" alt="">
                        </a>
                    </div>
                    <div class="d-flex">
                        <ul class="con-info custom-font">
                            @foreach($footers as $footer)
                                <li>
                                    <span>{{$footer->footer_key}} : </span>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="con-info custom-font">
                            @foreach($footers as $footer)
                                <li>
                                    <span class="fw-300">{{$footer->footer_value}} : </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="social-icon">
                        <h6 class="custom-font stit simple-btn">Follow Us</h6>
                        <div class="social">
                            <a href="{{ asset('#0') }}" class="icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="{{ asset('#0') }}" class="icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="{{ asset('#0') }}" class="icon">
                                <i class="fab fa-pinterest"></i>
                            </a>
                            <a href="{{ asset('#0') }}" class="icon">
                                <i class="fab fa-behance"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-2">
                <div class="subscribe mb-50">
                    <h6 class="custom-font stit simple-btn">Newslatter</h6>
                    <p>Sign up for subscribe out newsletter!</p>
                    <form>
                        <div class="form-group custom-font">
                            <input type="email" name="subscribe" placeholder="Your Email">
                            <button class="cursor-pointer">Subscribe</button>
                        </div>
                    </form>
                </div>
                <div class="insta">
                    <h6 class="custom-font stit simple-btn">Instagram Post</h6>
                    <div class="insta-gallary">
                        <a href="{{ asset('#0') }}">
                            <img src="{{ asset('assets/img/insta/1.jpg') }}" alt="">
                        </a>
                        <a href="{{ asset('#0') }}">
                            <img src="{{ asset('assets/img/insta/2.jpg') }}" alt="">
                        </a>
                        <a href="{{ asset('#0') }}">
                            <img src="{{ asset('assets/img/insta/3.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('client.components.copyrights')
    </div>
</footer>
