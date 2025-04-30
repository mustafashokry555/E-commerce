<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ session()->get('direction') }}">
<head>

    <meta name="base-url" content="{{ url('/') }}">
    <meta property="og:site_name" content="{{ $web_config['company_name'] }}" />

    <meta name="google-site-verification" content="{{getWebConfig('google_search_console_code')}}">
    <meta name="msvalidate.01" content="{{getWebConfig('bing_webmaster_code')}}">
    <meta name="baidu-site-verification" content="{{getWebConfig('baidu_webmaster_code')}}">
    <meta name="yandex-verification" content="{{getWebConfig('yandex_webmaster_code')}}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="robots" content="index, follow">
    <meta name="_token" content="{{csrf_token()}}">
    <link rel="shortcut icon" href="{{$web_config['fav_icon']['path']}}"/>

    @stack('css_or_js')
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/slick.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/js/fancybox/source/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/jquery.scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/mobile-menu.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/style.css') }}">
    <title>@yield('title')</title>


</head>
<body class="toolbar-enabled">
    @include('theme-views.layouts.new_partials._header')
    @yield('content')
    @include('theme-views.layouts.new_partials._footer')

<a href="#" class="backtotop">
    <i class="fa fa-angle-double-up"></i>
</a>




@include('theme-views.layouts.new_partials._translate-text-for-js')
@stack('script')
@include('theme-views.layouts.main-new-script')

{!! Toastr::message() !!}



</body>
</html>
