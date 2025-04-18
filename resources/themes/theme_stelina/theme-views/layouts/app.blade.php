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

    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/js/fancybox/source/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/jquery.scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/mobile-menu.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/style.css') }}">
    @stack('css_or_js')
    <title>@yield('title')</title>

    {{-- {!! getSystemDynamicPartials(type: 'analytics_script') !!} --}}
</head>
<body class="toolbar-enabled">
{{-- @include('theme-views.layouts.partials._alert-message') --}}
@include('theme-views.layouts.partials._header')
{{-- @include('theme-views.layouts.partials._settings-sidebar') --}}
@yield('content')
{{-- @include('theme-views.layouts.partials._feature') --}}
@include('theme-views.layouts.partials._footer')

<a href="#" class="backtotop">
    <i class="fa fa-angle-double-up"></i>
</a>


{{-- <div class="app-bar px-sm-2 d-xl-none" id="mobile_app_bar">
    @include('theme-views.layouts.partials._app-bar')
</div> --}}

{{-- <span class="customize-text"
    data-textno="{{ translate('no') }}"
    data-textyes="{{ translate('yes') }}"
    data-textnow="{{ translate('now') }}"
    data-textsuccessfullycopied="{{ translate('successfully_copied') }}"
    data-text-no-discount="{{ translate('no_discount') }}"
    data-stock-available="{{ translate('stock_available') }}"
    data-stock-not-available="{{ translate('stock_not_available') }}"
    data-update-this-address="{{ translate('update_this_Address') }}"
    data-password-characters-limit="{{ translate('your_password_must_be_at_least_8_characters') }}"
    data-password-not-match="{{ translate('password_does_not_Match') }}"
    data-textpleaseselectpaymentmethods="{{ translate('please_select_a_payment_Methods') }}"
    data-reviewmessage="{{ translate('you_can_review_after_the_product_is_delivered') }}"
    data-refundmessage="{{ translate('you_can_refund_request_after_the_product_is_delivered') }}"
    data-textshoptemporaryclose="{{ translate('This_shop_is_temporary_closed_or_on_vacation').' '.translate('You_cannot_add_product_to_cart_from_this_shop_for_now') }}"
></span>
<span class="system-default-country-code" data-value="{{ getWebConfig(name: 'country_code') ?? 'us' }}"></span>
<span class="cannot_use_zero" data-text="{{ translate('cannot_Use_0_only') }}"></span>
<span class="system-default-country-code" data-value="{{ getWebConfig(name: 'country_code') ?? 'us' }}"></span>
@php($cookie = $web_config['cookie_setting'] ? json_decode($web_config['cookie_setting']['value'], true):null)
@if($cookie && $cookie['status']==1)
    <section id="cookie-section"></section>
@endif --}}

{{-- @include('theme-views.layouts.partials.modal._register')
@include('theme-views.layouts.partials.modal._login')
@include('theme-views.layouts.partials.modal._quick-view')
@include('theme-views.layouts.partials.modal._buy-now')
@include('theme-views.layouts.partials.modal._initial') --}}

{{-- @php($whatsapp = getWebConfig(name: 'whatsapp'))
<div class="social-chat-icons">
    @if(isset($whatsapp['status']) && $whatsapp['status'] == 1 )
        <div class="">
            <a href="https://wa.me/{{ $whatsapp['phone'] }}?text=Hello%20there!" target="_blank">
                <img src="{{theme_asset('assets/img/whatsapp.svg')}}" width="35" class="chat-image-shadow"
                     alt="Chat with us on WhatsApp">
            </a>
        </div>
    @endif
</div> --}}

@include('theme-views.layouts.partials._translate-text-for-js')
{{-- @include('theme-views.layouts.partials._route-for-js') --}}
@include('theme-views.layouts.main-script')
{{-- @include('theme-views.layouts._firebase-script') --}}

{!! Toastr::message() !!}
{{-- <script>
    function route_alert(route, message) {
        Swal.fire({
            title: "{{translate('are_you_sure')}}?",
            text: message,
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: 'default',
            confirmButtonColor: '{{$web_config['primary_color']}}',
            cancelButtonText: '{{translate('no')}}',
            confirmButtonText: '{{translate('yes')}}',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                location.href = route;
            }
        })
    }
</script> --}}
@stack('script')

</body>
</html>
