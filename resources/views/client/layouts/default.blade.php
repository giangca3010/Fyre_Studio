<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="keywords" content="HTML5 Template Avo onepage themeforest"/>
    <meta name="description" content="Avo - Onepage Multi-Purpose HTML5 Template"/>
    <meta name="author" content=""/>

    <!-- Title  -->
    <title>Fyre Studio</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@200;300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}"/>

    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>

</head>

<body>

<!-- ==================== Start Loading ==================== -->

<div id="preloader">
</div>

<!-- ==================== End Loading ==================== -->

<!-- ==================== Start progress-scroll-button ==================== -->

<div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>

<!-- ==================== End progress-scroll-button ==================== -->

<!-- ==================== Start cursor ==================== -->

<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<!-- ==================== End cursor ==================== -->

@if (!empty($isNavi))
    @include('client.components.navi')
@else
    @include('client.components.nav')
@endif

@yield('content')

@if (empty($noFooter))
    @include('client.components.footer')
@endif

<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate-3.0.0.min.js') }}"></script>

<!-- plugins -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>

<!-- custom scripts -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>

</html>
