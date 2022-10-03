<div id="navi" class="topnav">
    <div class="container-fluid">
        <div class="logo">
            <a href="{{ route('home', ['language' => $language]) }}"><img src="{{ asset('assets/img/logo-light.png') }}" alt=""></a>
        </div>
        <div class="menu-icon">
                <span class="icon">
                    <i></i>
                    <i></i>
                </span>
            <span class="text" data-splitting>Menu</span>
        </div>
    </div>
</div>

<div class="hamenu">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="menu-links">
                    <ul class="main-menu">
                        @foreach($menus as $index => $menu)
                            <li>
                                <div class="o-hidden">
                                    <a href="{{ route($menu->router, ['language' => $language]) }}" class="link"><span class="nm">0{{ $index + 1 }}.</span>{{ $menu->{'name_' . $language} }}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="cont-info">
                    @foreach($footers as $footer)
                        <div class="item">
                            <h6>{{$footer->footer_key}} :</h6>
                            <p>{{$footer->footer_value}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
