@php
    use App\Utils\CartManager;
    use App\Utils\Helpers;
    use App\Models\Brand;
    use App\Models\Category;
    use App\Models\Product;
    use App\Utils\ProductManager;
@endphp
@php($categories = \App\Utils\CategoryManager::getCategoriesWithCountingAndPriorityWiseSorting(dataLimit: 11))
@php($brands = \App\Utils\BrandManager::getActiveBrandWithCountingAndPriorityWiseSorting())

<header class="header style7">
    <div class="top-bar">
        <div class="container" dir="ltr">
            <div class="top-bar-left">
                <div class="header-message">
                    {{ translate('Welcome_to_our_online_store') }}
                </div>
            </div>
            <div class="top-bar-right">
                <div class="header-language">
                    @php($local = Helpers::default_lang())
                    <div class="stelina-language stelina-dropdown">
                        <a href="#" class="active language-toggle" data-stelina="stelina-dropdown">
                            <span>
                                @foreach ($web_config['language'] as $data)
                                    @if ($data['code'] == $local)
                                        {{ ucwords($data['name']) }}
                                    @endif
                                @endforeach
                            </span>
                        </a>
                        <ul class="stelina-submenu">
                            @foreach ($web_config['language'] as $key => $data)
                                @if ($data['status'] == 1)
                                    <li class="switcher-option change-language"
                                        data-action="{{ route('change-language') }}"
                                        data-language-code="{{ $data['code'] }}">
                                        <a href="javascript:">
                                            <span>
                                                {{ ucwords($data['name']) }}
                                            </span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <ul class="header-user-links">
                    <li>
                        {{-- <style>
                            #phone-header::before {
                                content: "\f4e1"; /* Unicode for phone icon in Bootstrap Icons */
                                font-family: "bootstrap-icons"; /* Must match the font name used in the CSS */
                                font-style: normal;
                                font-weight: normal;
                                display: inline-block;
                                margin-right: 8px;
                                font-size: 1rem;
                                line-height: 1;
                            }
                        </style> --}}
                        {{-- <a href="{{ route('vendor.auth.registration.index') }}">{{ translate('become_a_vendor')
                            }}</a> --}}
                        {{-- <a href="{{ route('customer.auth.login') }}">{{ translate('Login') }}</a>
                        |
                        <a href="{{ route('customer.auth.sign-up') }}">{{ translate('Register') }}</a> --}}
                        <a href="tel:+{{ $web_config['phone'] }}" id="phone-header" class="d-flex gap-2 align-items-center direction-ltr">
                            {{-- <i class="bi bi-telephone-fill"></i> --}}
                            {{ $web_config['phone'] }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container" dir="ltr">
        <div class="main-header">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                    <div class="logo">
                        <a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0 __min-w-7rem"
                            href="{{ route('home') }}">
                            <img class="__inline-11" style="position: relative; top: -10px; height: 40px !important;"
                                src="{{ getStorageImages(path: $web_config['web_logo'], type: 'logo') }}"
                                alt="{{ $web_config['company_name'] }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                    <div class="block-search-block">
                        <form action="{{ route('products') }}" type="submit"
                            class="form-search form-search-width-category">
                            <div class="form-content">
                                <div class="category">
                                    <select title="cate" name="search_category_value" {{--
                                        data-placeholder="All Categories" --}}
                                        class="chosen-select" tabindex="1">
                                        <option value="all">{{ translate('all_categories') }}</option>
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="inner">
                                    <input type="text" class="input" name="product_name"
                                        value="{{ request('product_name') }}"
                                        placeholder="{{ translate('search_for_items') }}">
                                </div>
                                <input name="data_from" value="search" hidden>
                                <input name="page" value="1" hidden>
                                <button class="btn-search" type="submit">
                                    <span class="icon-search"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                    <div class="header-control">
                        <div class="block-minicart stelina-mini-cart block-header stelina-dropdown">
                            @php($cart = CartManager::getCartListQuery())
                            <a href="javascript:void(0);" class="shopcart-icon" data-stelina="stelina-dropdown">
                                Cart
                                <span class="count">
                                    {{ $cart->count() }}
                                </span>
                            </a>
                            @if ($cart->count() > 0)
                                <div class="shopcart-description stelina-submenu">
                                    <div class="content-wrap">
                                        <h3 class="title">{{ translate('Shopping_Cart') }}</h3>
                                        <ul class="minicart-items mCustomScrollbar _mCS_1">
                                            <div id="mCSB_1"
                                                class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"
                                                style="max-height: 250px;" tabindex="0">
                                                <div id="mCSB_1_container" class="mCSB_container"
                                                    style="position: relative; top: 0px; left: 0px;" dir="ltr">
                                                    @php($sub_total = 0)
                                                    @php($total_tax = 0)
                                                    @foreach ($cart as $cartItem)
                                                        @php($product = Product::find($cartItem['product_id']))
                                                        <li class="product-cart mini_cart_item">
                                                            <a href="{{ route('product', $product->slug) }}"
                                                                class="product-media">
                                                                <img loading="lazy" alt="Product"
                                                                    src="{{ getStorageImages(path: $cartItem?->product?->thumbnail_full_url, type: 'product') }}"
                                                                    class="mCS_img_loaded {{ $product && $product->status == 0 ? 'blur-section' : '' }}">
                                                                @if ($product && $product->status == 0)
                                                                    <span class="temporary-closed position-absolute text-center p-2">
                                                                        <span class="text-capitalize">{{ translate('not_available') }}</span>
                                                                    </span>
                                                                @endif
                                                            </a>
                                                            <div class="product-details">
                                                                <h5 class="product-name {{ $product && $product->status == 0 ? 'blur-section':'' }}">
                                                                    <a href="{{ $product && $product->status == 1 ? route('product',$cartItem['slug']) : 'javascript:'}}">
                                                                        {{Str::limit($cartItem['name'],30)}}
                                                                    </a>
                                                                </h5>
                                                                <div class="variations">
                                                                    @if(!empty($cartItem['variant']))
                                                                        <span class="attribute_color">
                                                                            {{translate('variant')}} : {{ $cartItem['variant'] }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                                <span class="product-price">
                                                                    <span class="price">
                                                                        <span>{{webCurrencyConverter(($cartItem['price']-$cartItem['discount']))}}</span>
                                                                    </span>
                                                                </span>
                                                                <span class="product-quantity cart_quantity_{{ $cartItem['id'] }}">
                                                                    (x{{$cartItem['quantity']}})
                                                                </span>
                                                                {{-- <div class="product-remove">
                                                                    <a href=""><i class="fa fa-trash-o"
                                                                            aria-hidden="true"></i></a>
                                                                </div> --}}
                                                            </div>
                                                        </li>
                                                        @php($sub_total+=($cartItem['price']-$cartItem['discount'])*(int)$cartItem['quantity'])
                                                        @php($total_tax+=$cartItem['tax']*(int)$cartItem['quantity'])
                                                    @endforeach
                                                </div>
                                                <div id="mCSB_1_scrollbar_vertical"
                                                    class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                                                    style="display: block;">
                                                    <div class="mCSB_draggerContainer">
                                                        <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                                            style="position: absolute; min-height: 30px; display: block; height: 173px; max-height: 240px; top: 0px;"
                                                            oncontextmenu="return false;">
                                                            <div class="mCSB_dragger_bar" style="line-height: 30px;">
                                                            </div>
                                                        </div>
                                                        <div class="mCSB_draggerRail"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                        <div class="subtotal">
                                            <span class="total-title">{{translate('total')}}: </span>
                                            <span class="total-price">
                                                <span class="Price-amount">
                                                    {{webCurrencyConverter($sub_total)}}
                                                </span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            @if($web_config['guest_checkout_status'] || auth('customer')->check())
                                                <a class="button button-viewcart" href="{{route('shop-cart')}}">
                                                    <span>{{translate('view_cart')}}</span>
                                                </a>
                                                <a href="{{route('checkout-details')}}" class="button button-checkout" style="padding: 7px 20px !important;">
                                                    <span>{{translate('checkout')}}</span>
                                                </a>
                                            @else
                                                <a class="button button-viewcart" href="{{ route('customer.auth.login') }}">
                                                    <span>{{translate('view_cart')}}</span>
                                                </a>
                                                <a href="{{ route('customer.auth.login') }}" class="button button-checkout" style="padding: 7px 20px !important;">
                                                    <span>{{translate('checkout')}}</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="no-product stelina-submenu">
                                    <p class="text">
                                        {{ translate('Your_Cart_is_Empty') }}!
                                    </p>
                                </div>
                            @endif
                        </div>
                        @if(auth('customer')->check())
                            <div style="top: -5px;" class="block-account block-header stelina-dropdown">
                                <a href="javascript:void(0);" data-stelina="stelina-dropdown">
                                    <span>
                                        @php($profileImg = getCustomerFromQuery() ? getCustomerFromQuery()->image_full_url : '')
                                        <img style="width: 40px; border-radius: 50%;" loading="lazy"
                                            alt="{{ translate('image') }}"
                                            src="{{ getStorageImages(path: $profileImg, type: 'avatar') }}">
                                    </span>
                                </a>
                                <div class="header-account stelina-submenu" style="min-width: 170px">
                                    <div class="header-user-form-tabs">
                                        <div class="tab-container">
                                            <div id="header-tab-login" class="tab-panel active">
                                                <ul style="list-style: none; padding: 0px;">
                                                    <li style="padding: 10px 20px">
                                                        <a
                                                            href="{{ route('account-oder') }}">{{ translate('My_Order') }}</a>
                                                    </li>
                                                    <hr style="margin: 0px">
                                                    <li style="padding: 10px 20px">
                                                        <a
                                                            href="{{ route('user-profile') }}">{{ translate('My_Profile') }}</a>
                                                    </li>
                                                    <hr style="margin: 0px">
                                                    <li style="padding: 10px 20px">
                                                        <a
                                                            href="{{ route('customer.auth.logout') }}">{{ translate('Logout') }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="block-account block-header stelina-dropdown">

                                <a href="javascript:void(0);" data-stelina="stelina-dropdown">
                                    <span class="flaticon-user"></span>
                                </a>
                                <div class="header-account stelina-submenu">
                                    <div class="header-user-form-tabs">
                                        <div class="tab-container">
                                            <div id="header-tab-login" class="tab-panel active">
                                                <div class="text-center">
                                                    <div>
                                                        <a style="width: 150px;margin: 20px 0 10px;"
                                                            class="button btn btn-peimary"
                                                            href="{{ route('customer.auth.login') }}">
                                                            {{ translate('Login') }}
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a style="width: 150px;margin: 10px 0 20px;"
                                                            class="button btn btn-peimary"
                                                            href="{{ route('customer.auth.sign-up') }}">
                                                            {{ translate('Register') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <a class="menu-bar mobile-navigation menu-toggle" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav-container">
        <div class="container">
            <div class="header-nav-wapper main-menu-wapper">
                <div class="vertical-wapper block-nav-categori">
                    <div class="block-title">
                        <span class="icon-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="text">{{ translate('All Categories') }}</span>
                    </div>
                    <div class="block-content verticalmenu-content">
                        <ul class="stelina-nav-vertical vertical-menu stelina-clone-mobile-menu">
                            {{-- <li class="menu-item">
                                <a class="d-flex" data-value="{{ $category->id }}" href="javascript:">
                                    {{ translate('all_categories') }}
                                </a>
                            </li> --}}
                            @if ($categories)
                                @foreach ($categories as $category)
                                    <li class="menu-item">
                                        <a class="d-flex" data-value="{{ $category->id }}"
                                            href="{{ route('products', ['category_id' => $category->id, 'data_from' => 'category', 'page' => 1]) }}">
                                            {{ $category['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="header-nav">
                    <div class="container-wapper">
                        <ul class="stelina-clone-mobile-menu stelina-nav main-menu " id="menu-main-menu">
                            <li>
                                <a href="{{ route('home') }}" class="stelina-menu-item-title" title="Home">
                                    {{ translate('Home') }}
                                </a>
                            </li>
                            {{-- <li class="menu-item menu-item-has-children">
                                <a href="gridproducts.html" class="stelina-menu-item-title" title="Shop">{{
                                    translate('stores') }}</a>
                                <span class="toggle-submenu"></span>
                                <ul class="submenu">
                                    @foreach ($web_config['shops']->take(5) as $shop)
                                    <li class="menu-item">
                                        <a href="{{ route('shopView', ['id' => $shop['id']]) }}">
                                            {{ Str::limit($shop->name, 14) }}
                                        </a>
                                    </li>
                                    @endforeach
                                    <li class="menu-item">
                                        <a href="{{ route('vendors') }}"
                                            class="fw-bold text-primary d-flex justify-content-center">
                                            {{ translate('view_all') . '...' }}
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            <li class="menu-item  menu-item-has-children item-megamenu">
                                <a href="#" class="stelina-menu-item-title"
                                    title="{{ translate('brands') }}">{{ translate('brands') }}</a>
                                <span class="toggle-submenu"></span>
                                <ul class="submenu">
                                    @foreach ($brands->take(5) as $brand)
                                        <li class="menu-item">
                                            <a
                                                href="{{ route('products', ['brand_id' => $brand['id'], 'data_from' => 'brand', 'page' => 1]) }}">
                                                {{ $brand->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                    <li class="menu-item">
                                        <a href="{{ route('brands') }}"
                                            class="fw-bold text-primary d-flex justify-content-center">{{ translate('view_all') . '...' }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-device-mobile">
    <div class="wapper">
        <div class="item mobile-logo">
            <div class="logo">
                <a class=" d-sm-none" href="{{ route('home') }}">
                    <img class="mobile-logo-img" style="height: 60px !important"
                        src="{{ getStorageImages(path: $web_config['mob_logo'], type: 'logo') }}"
                        alt="{{ $web_config['company_name'] }}" />
                </a>
            </div>
        </div>
        <div class="item item mobile-search-box has-sub">
            <a href="#">
                <span class="icon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </span>
            </a>
            <div class="block-sub">
                <a href="#" class="close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="header-searchform-box">
                    <form class="header-searchform">
                        <div class="searchform-wrap">
                            <input type="text" class="search-input" placeholder="Enter keywords to search...">
                            <input type="submit" class="submit button" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="item mobile-settings-box has-sub">
            <a href="#">
                <span class="icon">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </span>
            </a>
            <div class="block-sub">
                <a href="#" class="close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="block-sub-item">
                    <h5 class="block-item-title">Currency</h5>
                    <form class="currency-form stelina-language">
                        <ul class="stelina-language-wrap">
                            <li class="active">
                                <a href="#">
                                    <span>
                                        English (USD)
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>
                                        French (EUR)
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>
                                        Japanese (JPY)
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <div class="item menu-bar">
            <a class=" mobile-navigation  menu-toggle" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </div>
</div>

<script src="{{ theme_asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/toastr.js') }}"></script>
<script>
    toastr.options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
    $(".change-language").on("click", function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: $(this).data("action"),
            data: {
                language_code: $(this).data("language-code"),
            },
            beforeSend: function() {
                $("#loading").addClass("d-grid");
            },
            success: function(data) {
                toastr.success(data.message);
                location.reload();
            },
            complete: function() {
                $("#loading").removeClass("d-grid");
            },
        });
    });
</script>
