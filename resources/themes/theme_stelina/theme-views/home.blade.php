@extends('theme-views.layouts.new_app')

@section('title', $web_config['company_name'] . ' ' . translate('Online_Shopping') . ' | ' . $web_config['company_name']. ' ' . translate('ecommerce'))
@push('css_or_js')
    <meta property="og:image" content="{{ $web_config['web_logo']['path'] }}" />
    <meta property="og:title" content="Welcome To {{ $web_config['company_name'] }} Home" />
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:description"
        content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)), 0, 160) }}">
    <meta name="description"
        content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)), 0, 160) }}">

    <meta property="twitter:card" content="{{ $web_config['web_logo']['path'] }}" />
    <meta property="twitter:title" content="Welcome To {{ $web_config['company_name'] }} Home" />
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:description"
        content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)), 0, 160) }}">
@endpush

@section('content')
    <style>
        .in-wishlist:before {
            content: "\f004" !important;
        }
        .in-wishlist-cart:before {
            content: "\f004" !important;
            color: #ab8e66 !important
        }
        .not-in-wishlist:before {
            content: "\f08a" !important;
        }
        .product-item .thumb-group .quick-wiew-button::before {
            content: "\f12e";
        }
        .product-item.style-3 .button.quick-wiew-button::before {
            content: "\f12e";
        }
    </style>
    <div class="main-content">
        <div class="fullwidth-template">

            <div class="home-slider style1 rows-space-30" dir="ltr">
                <div class="container">
                    <div class="slider-owl owl-slick equal-container nav-center"
                        data-slick='{"autoplay":true, "autoplaySpeed":9000, "arrows":true, "dots":false, "infinite":true, "speed":1000, "rows":1}'
                        data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>
                        @foreach ($bannerTypeMainBanner as $banner)
                            <div class="slider-item style1">
                                <div class="slider-inner equal-element"
                                    style="background-image: url({{ $banner->photo_full_url['path'] }})">
                                    <div class="slider-infor">
                                        <h5 class="title-small">
                                            {{ $banner->resource_type }}
                                        </h5>
                                        @if ($banner->resource_type == 'product')
                                            <h3 class="title-big">
                                                {{ $banner->product->name }}
                                            </h3>
                                            <div class="price">
                                                {{ translate('Price from') }}:
                                                <span class="number-price">
                                                    ${{ $banner->product->unit_price }}
                                                </span>
                                            </div>
                                        @elseif ($banner->resource_type == 'category')

                                        @elseif ($banner->resource_type == 'shop')

                                        @elseif ($banner->resource_type == 'brand')
                                        @endif
                                        <a href="{{ $banner->url }}" class="button btn-shop-the-look bgroud-style">
                                            {{ translate('Shop now') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="banner-wrapp rows-space-35">
                <div class="container">
                    <div class="row">
                        @foreach ($categories->take(3) as $categorie)
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="banner">
                                    <div class="item-banner style12">
                                        <div class="inner"
                                            style="height: 250px;
                                background-image: url({{ $categorie->icon_full_url['path'] }});
                                background-position: center;
                                background-size: cover;
                                color: black !important;
                                border-radius: 85px;
                                ">
                                            <div class="banner-content">
                                                <h3 class="title" style="color: black !important;">
                                                    {{ $categorie->name }}
                                                </h3>
                                                <div class="description">
                                                    Check out our your <br />
                                                    perfume collection now!
                                                </div>
                                                <a style="color: black !important;"
                                                    href="{{ route('products', ['category_id' => $categorie->id, 'data_from' => 'category', 'page' => 1]) }}"
                                                    class="button btn-shop-now">
                                                    {{ translate('Shop now') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="stelina-tabs  default rows-space-40">
                <div class="container">
                    <div class="tab-head">
                        <ul class="tab-link">
                            <li class="active">
                                <a data-toggle="tab" aria-expanded="true"
                                    href="#bestseller">{{ translate('Best_Selling') }}</a>
                            </li>
                            <li class>
                                <a data-toggle="tab" aria-expanded="true"
                                    href="#new_arrivals">{{ translate('New Arrivals') }}</a>
                            </li>
                            <li class>
                                <a data-toggle="tab" aria-expanded="true"
                                    href="#top-rated">{{ translate('Top_Rated') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-container">
                        <div id="bestseller" class="tab-panel active">
                            <div class="d-flex flex-wrap justify-content-end gap-3 " style="margin-bottom: 15px">
                                <i
                                    class="fa fa-angle-double-{{ Session::get('direction') === 'rtl' ? 'right ml-1' : 'left mr-1 ml-n1 mt-1 ' }} view-all-text"></i>
                                <a href="{{ route('products', ['data_from' => 'best-selling']) }}"
                                    class="view-all-text text-right  text-capitalize">
                                    <span>{{ translate('view_all') }}</span>
                                </a>
                            </div>
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    @foreach ($bestSellProduct->take(8) as $product)
                                        @php($overallRating = $product->reviews ? getOverallRating($product->reviews) : 0)
                                        <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                            <div class="product-inner equal-element">
                                                <div class="product-thumb">
                                                    <div class="thumb-inner">
                                                        <a href="{{ route('product', $product->slug) }}">
                                                            <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}"
                                                                alt="" style="height: 300px !important">
                                                        </a>
                                                        <div class="thumb-group">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <div class="yith-wcwl-add-button">
                                                                    @if($web_config['guest_checkout_status'] || auth('customer')->check())
                                                                        <a href="javascript:void(0);"
                                                                            data-product-id="{{ $product->id }}"
                                                                            data-url="{{ route('store-wishlist') }}"
                                                                            class="wishlist-toggle {{ isProductInWishList($product->id) ? 'in-wishlist' : 'not-in-wishlist' }}">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ route('customer.auth.login') }}">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <a href="#" class="button quick-wiew-button" data-product-id="{{ $product->id }}">Quick View</a>
                                                            {{-- <div class="loop-form-add-to-cart">
                                                                <button class="single_add_to_cart_button button">Add
                                                                    to cart
                                                                </button>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5 class="product-name product_title">
                                                        <a href="{{ route('product', $product->slug) }}"
                                                            class="text-capitalize fw-semibold">
                                                            {{ $product['name'] }}
                                                        </a>
                                                    </h5>
                                                    <div class="group-info">
                                                        <div class="stars-rating">
                                                            <div class="star-rating">
                                                                @for ($index = 1; $index <= 5; $index++)
                                                                    @if ($index <= (int) $overallRating[0])
                                                                        <i class="bi bi-star-fill"></i>
                                                                    @elseif ($overallRating[0] != 0 && $index <= (int) $overallRating[0] + 1.1 && $overallRating[0] > ((int) $overallRating[0]))
                                                                        <i class="bi bi-star-half"></i>
                                                                    @else
                                                                        <i class="bi bi-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div class="count-star">
                                                                ( {{ count($product->reviews) }} )
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            @if (getProductPriceByType(product: $product, type: 'discount', result: 'value') > 0)
                                                                <del
                                                                    class="product__old-price">{{ webCurrencyConverter($product->unit_price) }}</del>
                                                            @endif
                                                            <ins class="product__new-price">
                                                                {{ getProductPriceByType(product: $product, type: 'discounted_unit_price', result: 'string') }}
                                                            </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="new_arrivals" class="tab-panel">
                            <div class="d-flex flex-wrap justify-content-end gap-3 " style="margin-bottom: 15px">
                                <i
                                    class="fa fa-angle-double-{{ Session::get('direction') === 'rtl' ? 'right ml-1' : 'left mr-1 ml-n1 mt-1 ' }} view-all-text"></i>
                                <a href="{{ route('products', ['data_from' => 'latest']) }}"
                                    class="view-all-text text-right  text-capitalize">
                                    <span>{{ translate('view_all') }}</span>
                                </a>
                            </div>
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    @foreach ($latestProductsList->take(8) as $product)
                                        @php($overallRating = $product->reviews ? getOverallRating($product->reviews) : 0)
                                        <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                            <div class="product-inner equal-element">
                                                <div class="product-top">
                                                    <div class="flash">
                                                        <span class="onnew">
                                                            <span class="text">
                                                                {{ translate('new') }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="product-thumb">
                                                    <div class="thumb-inner">
                                                        <a href="{{ route('product', $product->slug) }}">
                                                            <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}"
                                                                alt="" style="height: 300px !important">
                                                        </a>
                                                        <div class="thumb-group">
                                                            <div class="yith-wcwl-add-to-wishlist ">
                                                                <div class="yith-wcwl-add-button">
                                                                    @if($web_config['guest_checkout_status'] || auth('customer')->check())
                                                                        <a href="javascript:void(0);"
                                                                            data-product-id="{{ $product->id }}"
                                                                            data-url="{{ route('store-wishlist') }}"
                                                                            class="wishlist-toggle {{ isProductInWishList($product->id) ? 'in-wishlist' : 'not-in-wishlist' }}">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ route('customer.auth.login') }}">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <a href="#" class="button quick-wiew-button" data-product-id="{{ $product->id }}">Quick View</a>
                                                            {{-- <div class="loop-form-add-to-cart">
                                                                <button class="single_add_to_cart_button button">Add
                                                                    to cart
                                                                </button>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5 class="product-name product_title">
                                                        <a href="{{ route('product', $product->slug) }}"
                                                            class="text-capitalize fw-semibold">
                                                            {{ $product['name'] }}
                                                        </a>
                                                    </h5>
                                                    <div class="group-info">
                                                        <div class="stars-rating">
                                                            <div class="star-rating">
                                                                @for ($index = 1; $index <= 5; $index++)
                                                                    @if ($index <= (int) $overallRating[0])
                                                                        <i class="bi bi-star-fill"></i>
                                                                    @elseif ($overallRating[0] != 0 && $index <= (int) $overallRating[0] + 1.1 && $overallRating[0] > ((int) $overallRating[0]))
                                                                        <i class="bi bi-star-half"></i>
                                                                    @else
                                                                        <i class="bi bi-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div class="count-star">
                                                                ( {{ count($product->reviews) }} )
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            @if (getProductPriceByType(product: $product, type: 'discount', result: 'value') > 0)
                                                                <del
                                                                    class="product__old-price">{{ webCurrencyConverter($product->unit_price) }}</del>
                                                            @endif
                                                            <ins class="product__new-price">
                                                                {{ getProductPriceByType(product: $product, type: 'discounted_unit_price', result: 'string') }}
                                                            </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="top-rated" class="tab-panel">
                            <div class="d-flex flex-wrap justify-content-end gap-3 " style="margin-bottom: 15px">
                                <i
                                    class="fa fa-angle-double-{{ Session::get('direction') === 'rtl' ? 'right ml-1' : 'left mr-1 ml-n1 mt-1 ' }} view-all-text"></i>
                                <a href="{{ route('products', ['data_from' => 'top-rated']) }}"
                                    class="view-all-text text-right  text-capitalize">
                                    <span>{{ translate('view_all') }}</span>
                                </a>
                            </div>
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    @foreach ($topRatedProducts->take(8) as $product)
                                        @php($overallRating = $product->reviews ? getOverallRating($product->reviews) : 0)
                                        <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                            <div class="product-inner equal-element">
                                                <div class="product-thumb">
                                                    <div class="thumb-inner">
                                                        <a href="{{ route('product', $product->slug) }}">
                                                            <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}"
                                                                alt="" style="height: 300px !important">
                                                        </a>
                                                        <div class="thumb-group">

                                                            <div class="yith-wcwl-add-to-wishlist ">
                                                                <div class="yith-wcwl-add-button">
                                                                    @if($web_config['guest_checkout_status'] || auth('customer')->check())
                                                                        <a href="javascript:void(0);"
                                                                            data-product-id="{{ $product->id }}"
                                                                            data-url="{{ route('store-wishlist') }}"
                                                                            class="wishlist-toggle {{ isProductInWishList($product->id) ? 'in-wishlist' : 'not-in-wishlist' }}">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ route('customer.auth.login') }}">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <a href="#" class="button quick-wiew-button" data-product-id="{{ $product->id }}">Quick View</a>
                                                            {{-- <div class="loop-form-add-to-cart">
                                                                <button class="single_add_to_cart_button button">Add
                                                                    to cart
                                                                </button>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5 class="product-name product_title">
                                                        <a href="{{ route('product', $product->slug) }}"
                                                            class="text-capitalize fw-semibold">
                                                            {{ $product['name'] }}
                                                        </a>
                                                    </h5>
                                                    <div class="group-info">
                                                        <div class="stars-rating">
                                                            <div class="star-rating">
                                                                @for ($index = 1; $index <= 5; $index++)
                                                                    @if ($index <= (int) $overallRating[0])
                                                                        <i class="bi bi-star-fill"></i>
                                                                    @elseif ($overallRating[0] != 0 && $index <= (int) $overallRating[0] + 1.1 && $overallRating[0] > ((int) $overallRating[0]))
                                                                        <i class="bi bi-star-half"></i>
                                                                    @else
                                                                        <i class="bi bi-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div class="count-star">
                                                                ( {{ count($product->reviews) }} )
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            @if (getProductPriceByType(product: $product, type: 'discount', result: 'value') > 0)
                                                                <del
                                                                    class="product__old-price">{{ webCurrencyConverter($product->unit_price) }}</del>
                                                            @endif
                                                            <ins class="product__new-price">
                                                                {{ getProductPriceByType(product: $product, type: 'discounted_unit_price', result: 'string') }}
                                                            </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner-wrapp rows-space-60">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner">
                                <div class="item-banner style6">
                                    <div class="inner">
                                        <div class="container">
                                            <div class="banner-content">
                                                <h4 class="stelina-subtitle">Celebrate
                                                    Day Sale!</h4>
                                                <h3 class="title">Save
                                                    <span>25%</span> Of On
                                                    All<br />Items
                                                    Collection
                                                </h3>
                                                <a href="#" class="button btn-view-promotion">Shop
                                                    now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-in-stock-wrapp">
                <div class="container">
                    <h3 class="custommenu-title-blog white">
                        {{ translate('featured_Products') }}
                    </h3>
                    <div class="stelina-product style3">
                        <div class="d-flex flex-wrap justify-content-end gap-3 " style="margin-bottom: 15px">
                            <i
                                class="fa fa-angle-double-{{ Session::get('direction') === 'rtl' ? 'right ml-1' : 'left mr-1 ml-n1 mt-1 ' }} view-all-text"></i>
                            <a href="{{ route('products', ['data_from' => 'featured']) }}"
                                class="view-all-text text-right  text-capitalize">
                                <span>{{ translate('view_all') }}</span>
                            </a>
                        </div>
                        <ul class="row list-products auto-clear equal-container product-grid">
                            @foreach ($featuredProductsList->take(9) as $product)
                                @php($overallRating = $product->reviews ? getOverallRating($product->reviews) : 0)
                                <li class="product-item  col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-3">
                                    <div class="product-inner equal-element">
                                        <div class="product-thumb">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                                {{-- <div class="yith-wcwl-add-to-wishlist {{ isProductInWishList($product->id) ? 'in-wishlist' : 'not-in-wishlist' }}">
                                                    <div class="yith-wcwl-add-button">
                                                        <a href="#">Add
                                                            to
                                                            Wishlist</a>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="thumb-inner">
                                                <a href="{{ route('product', $product->slug) }}">
                                                    <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <a href="" class="button quick-wiew-button" data-product-id="{{ $product->id }}">Quick View</a>
                                        </div>
                                        <div class="product-info">

                                            <h5 class="product-name product_title">
                                                <a href="{{ route('product', $product->slug) }}"
                                                    class="text-capitalize fw-semibold" style="white-space: normal;">
                                                    {{ $product['name'] }}
                                                </a>
                                            </h5>

                                            <div class="group-info">
                                                <div class="stars-rating">
                                                    <div class="star-rating">
                                                        @for ($index = 1; $index <= 5; $index++)
                                                            @if ($index <= (int) $overallRating[0])
                                                                <i class="bi bi-star-fill"></i>
                                                            @elseif ($overallRating[0] != 0 && $index <= (int) $overallRating[0] + 1.1 && $overallRating[0] > ((int) $overallRating[0]))
                                                                <i class="bi bi-star-half"></i>
                                                            @else
                                                                <i class="bi bi-star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="count-star">
                                                        ( {{ count($product->reviews) }} )
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    @if (getProductPriceByType(product: $product, type: 'discount', result: 'value') > 0)
                                                        <del
                                                            class="product__old-price">{{ webCurrencyConverter($product->unit_price) }}</del>
                                                    @endif
                                                    <ins class="product__new-price">
                                                        {{ getProductPriceByType(product: $product, type: 'discounted_unit_price', result: 'string') }}
                                                    </ins>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>



            <div class="banner-wrapp rows-space-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="banner">
                                <div class="item-banner style10">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h4 class="stelina-subtitle">Jewelry
                                                Collection!</h4>
                                            <h3 class="title">Big Deal Of
                                                The Day</h3>
                                            <div class="description">
                                                We’ve been waiting for you!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="banner">
                                <div class="item-banner style11">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h4 class="stelina-subtitle">Let’s
                                                us make your style!</h4>
                                            <h3 class="title">Best
                                                Collection </h3>
                                            <div class="description">
                                                A complete shopping guide on
                                                what & how to wear it!
                                            </div>
                                            <a href="#" class="button btn-shopping-us">Shop
                                                now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="stelina-iconbox-wrapp default">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="stelina-iconbox  default">
                            <div class="iconbox-inner">
                                <div class="icon-item">
                                    <span class="icon flaticon-rocket-ship"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        EU Free Delivery
                                    </h4>
                                    <div class="text">
                                        Free Delivery on all order from EU <br />with price more than $90.00
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="stelina-iconbox  default">
                            <div class="iconbox-inner">
                                <div class="icon-item">
                                    <span class="icon flaticon-return"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        Money Guarantee
                                    </h4>
                                    <div class="text">
                                        30 Days money back guarantee <br />no question asked!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="stelina-iconbox  default">
                            <div class="iconbox-inner">
                                <div class="icon-item">
                                    <span class="icon flaticon-padlock"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        Online Support 24/7
                                    </h4>
                                    <div class="text">
                                        We’re here to support to you. <br />Let’s shopping now!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="instagram-wrapp">
        <div>
            <div class="stelina-instagram">
                <div class="instagram owl-slick equal-container"
                    data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":false, "infinite":true, "speed":800, "rows":1}'
                    data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":5}},{"breakpoint":"1200","settings":{"slidesToShow":4}},{"breakpoint":"992","settings":{"slidesToShow":3}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":2}}]'>
                    <div class="item-instagram">
                        <a>
                            <img src="{{ theme_asset('assets/new_them/images/item-instagram-01.jpg') }}" alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-photo-camera" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a>
                            <img src="{{ theme_asset('assets/new_them/images/item-instagram-02.jpg') }}" alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-photo-camera" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a>
                            <img src="{{ theme_asset('assets/new_them/images/item-instagram-03.jpg') }}" alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-photo-camera" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a>
                            <img src="{{ theme_asset('assets/new_them/images/item-instagram-04.jpg') }}" alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-photo-camera" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a>
                            <img src="{{ theme_asset('assets/new_them/images/item-instagram-05.jpg') }}" alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-photo-camera" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).on('click', '.wishlist-toggle', function (e) {
        e.preventDefault();

        let $this = $(this);
        let url = $this.data('url');
        let productId = $this.data('product-id');

        $.post(url, {
            product_id: productId,
            _token: '{{ csrf_token() }}'
        }, function () {
            // Toggle classes
            $this.toggleClass('in-wishlist not-in-wishlist');
            $('.kt-popup-quickview .details-infor .group-button .yith-wcwl-add-to-wishlist > div a').toggleClass('in-wishlist-cart not-in-wishlist');
        });
    });
</script>
@endsection
