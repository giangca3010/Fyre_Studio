<nav class="navbar navbar-expand-lg">
    <div class="container">

        <!-- Logo -->
        <a class="logo" href="{{ route('home', ['language' => $language]) }}">
            <img src="{{ asset('assets/img/logo-light.png') }}" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"><i class="fas fa-bars"></i></span>
        </button>

        <!-- navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @foreach($menus as $menu)
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route($menu->router, ['language' => $language]) }}">{{ $menu->{'name_' . $language} }}</a>
                    </li>
                @endforeach
            </ul>
            <div>
                <a href="{{ url()->current() . '?language=vi'}}">
                    <img src="{{ asset('assets/icons/vietnam.png') }}" alt="">
                </a>
                <a href="{{ url()->current() . '?language=en'}}">
                    <img src="{{ asset('assets/icons/united-states.png') }}" alt="">
                </a>
            </div>
            {{--<div class="search">
                <span class="icon pe-7s-search cursor-pointer"></span>
                <div class="search-form text-center custom-font">
                    <form>
                        <input type="text" name="search" placeholder="Search">
                    </form>
                    <span class="close pe-7s-close cursor-pointer"></span>
                </div>
            </div>--}}
        </div>
    </div>
</nav>
