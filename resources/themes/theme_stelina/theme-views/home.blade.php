{{-- @php
dd($topRatedProducts);
    print_r(json_encode($topRatedProducts));
    return 0;
@endphp --}}
@extends('theme-views.layouts.app')

@section('title', $web_config['company_name'].' '.translate('Online_Shopping').' | '.$web_config['company_name'].' '.translate('ecommerce'))
@push('css_or_js')
    <meta property="og:image" content="{{$web_config['web_logo']['path']}}"/>
    <meta property="og:title" content="Welcome To {{$web_config['company_name']}} Home"/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">
    <meta name="description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">

    <meta property="twitter:card" content="{{$web_config['web_logo']['path']}}"/>
    <meta property="twitter:title" content="Welcome To {{$web_config['company_name']}} Home"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">
@endpush

@section('content')
    <div class="main-content">
        <div class="fullwidth-template">

            <div class="home-slider style1 rows-space-30" dir="ltr">
                <div class="container">
                    <div
                        class="slider-owl owl-slick equal-container nav-center"
                        data-slick='{"autoplay":true, "autoplaySpeed":9000, "arrows":true, "dots":false, "infinite":true, "speed":1000, "rows":1}'
                        data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>
                        <div class="slider-item style1">
                            <div class="slider-inner equal-element">
                                <div class="slider-infor">
                                    <h5 class="title-small">
                                        New Arrivals!
                                    </h5>
                                    <h3 class="title-big">
                                        Scandinavians<br />
                                        Collection
                                    </h3>
                                    <div class="price">
                                        Price from:
                                        <span class="number-price">
                                            $75.00
                                        </span>
                                    </div>
                                    <a href="#"
                                        class="button btn-shop-the-look bgroud-style">Shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item style2">
                            <div class="slider-inner equal-element">
                                <div class="slider-infor">
                                    <h5 class="title-small">
                                        Table Supplies Sale!
                                    </h5>
                                    <h3 class="title-big">
                                        Up to <span>75%</span> <br /> Store
                                        Items
                                    </h3>
                                    <div class="price">
                                        Price from:
                                        <span class="number-price">
                                            $95.00
                                        </span>
                                    </div>
                                    <a href="#"
                                        class="button btn-shop-now">Shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item style3">
                            <div class="slider-inner equal-element">
                                <div class="slider-infor">
                                    <h5 class="title-small">
                                        New Arrivals!
                                    </h5>
                                    <h3 class="title-big">
                                        Trending <br />
                                        Collection
                                    </h3>
                                    <div class="price">
                                        Price from:
                                        <span class="number-price">
                                            $75.00
                                        </span>
                                    </div>
                                    <a href="#"
                                        class="button btn-shop-the-look bgroud-style">Shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner-wrapp rows-space-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="banner">
                                <div class="item-banner style12">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h3 class="title">Best
                                                Seller</h3>
                                            <div class="description">
                                                Check out our your <br />
                                                perfume collection now!
                                            </div>
                                            <a href="#"
                                                class="button btn-shop-now">Shop
                                                now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="banner">
                                <div class="item-banner style14">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h4 class="stelina-subtitle">End
                                                this weekend</h4>
                                            <h3 class="title">Big Sale
                                                <br />75% Off</h3>
                                            <div class="code">
                                                Use promo Code:
                                                <span
                                                    class="nummer-code">STELINA</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="banner">
                                <div class="item-banner style12 type2">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h3 class="title">Lookbook</h3>
                                            <div class="description">
                                                New Jewelry Collections
                                                <br />Summer Lookbook
                                            </div>
                                            <a href="#"
                                                class="button btn-view-the-look">Shop
                                                now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    @foreach($bestSellProduct->take(8) as $product)
                                        @php($overallRating = $product->reviews ? getOverallRating($product->reviews) : 0)
                                        <li
                                            class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                            <div
                                                class="product-inner equal-element">
                                                {{-- <div class="product-top">
                                                    <div class="flash">
                                                        <span class="onnew">
                                                            <span class="text">
                                                                new
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div> --}}
                                                <div class="product-thumb">
                                                    <div class="thumb-inner">
                                                        <a href="{{ route('product', $product->slug) }}">
                                                            <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}" alt="">
                                                        </a>
                                                        <div
                                                            class="thumb-group">
                                                            <div
                                                                class="yith-wcwl-add-to-wishlist">
                                                                <div
                                                                    class="yith-wcwl-add-button">
                                                                    <a
                                                                        href="#">Add
                                                                        to
                                                                        Wishlist</a>
                                                                </div>
                                                            </div>
                                                            <a href="#"
                                                                class="button quick-wiew-button">Quick
                                                                View</a>
                                                            <div
                                                                class="loop-form-add-to-cart">
                                                                <button
                                                                    class="single_add_to_cart_button button">Add
                                                                    to cart
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5
                                                        class="product-name product_title">
                                                        <a href="{{route('product',$product->slug)}}" class="text-capitalize fw-semibold">
                                                            {{ $product['name'] }}
                                                        </a>
                                                    </h5>
                                                    <div class="group-info">
                                                        <div
                                                            class="stars-rating">
                                                            <div
                                                                class="star-rating">
                                                                @for ($index = 1; $index <= 5; $index++)
                                                                    @if ($index <= (int)$overallRating[0])
                                                                        <i class="bi bi-star-fill"></i>
                                                                    @elseif ($overallRating[0] != 0 && $index <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0]))
                                                                        <i class="bi bi-star-half"></i>
                                                                    @else
                                                                        <i class="bi bi-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div
                                                                class="count-star">
                                                                ( {{count($product->reviews)}} )
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            @if(getProductPriceByType(product: $product, type: 'discount', result: 'value') > 0)
                                                                <del class="product__old-price">{{webCurrencyConverter($product->unit_price)}}</del>
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
                            <div class="stelina-product">
                                <ul
                                    class="row list-products auto-clear equal-container product-grid">
                                    @foreach($latestProductsList->take(8) as $product)
                                        @php($overallRating = $product->reviews ? getOverallRating($product->reviews) : 0)
                                        <li
                                            class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                            <div
                                                class="product-inner equal-element">
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
                                                            <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}" alt="">
                                                        </a>
                                                        <div
                                                            class="thumb-group">
                                                            <div
                                                                class="yith-wcwl-add-to-wishlist">
                                                                <div
                                                                    class="yith-wcwl-add-button">
                                                                    <a
                                                                        href="#">Add
                                                                        to
                                                                        Wishlist</a>
                                                                </div>
                                                            </div>
                                                            <a href="#"
                                                                class="button quick-wiew-button">Quick
                                                                View</a>
                                                            <div
                                                                class="loop-form-add-to-cart">
                                                                <button
                                                                    class="single_add_to_cart_button button">Add
                                                                    to cart
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5
                                                        class="product-name product_title">
                                                        <a href="{{route('product',$product->slug)}}" class="text-capitalize fw-semibold">
                                                            {{ $product['name'] }}
                                                        </a>
                                                    </h5>
                                                    <div class="group-info">
                                                        <div
                                                            class="stars-rating">
                                                            <div
                                                                class="star-rating">
                                                                @for ($index = 1; $index <= 5; $index++)
                                                                    @if ($index <= (int)$overallRating[0])
                                                                        <i class="bi bi-star-fill"></i>
                                                                    @elseif ($overallRating[0] != 0 && $index <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0]))
                                                                        <i class="bi bi-star-half"></i>
                                                                    @else
                                                                        <i class="bi bi-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div
                                                                class="count-star">
                                                                ( {{count($product->reviews)}} )
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            @if(getProductPriceByType(product: $product, type: 'discount', result: 'value') > 0)
                                                                <del class="product__old-price">{{webCurrencyConverter($product->unit_price)}}</del>
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
                            <div class="stelina-product">
                                <ul
                                    class="row list-products auto-clear equal-container product-grid">
                                    @foreach($topRatedProducts->take(8) as $product)
                                        @php($overallRating = $product->reviews ? getOverallRating($product->reviews) : 0)
                                        <li
                                            class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                            <div
                                                class="product-inner equal-element">
                                                {{-- <div class="product-top">
                                                    <div class="flash">
                                                        <span class="onnew">
                                                            <span class="text">
                                                                {{ translate('new') }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div> --}}
                                                <div class="product-thumb">
                                                    <div class="thumb-inner">
                                                        <a href="{{ route('product', $product->slug) }}">
                                                            <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}" alt="">
                                                        </a>
                                                        <div
                                                            class="thumb-group">
                                                            <div
                                                                class="yith-wcwl-add-to-wishlist">
                                                                <div
                                                                    class="yith-wcwl-add-button">
                                                                    <a
                                                                        href="#">Add
                                                                        to
                                                                        Wishlist</a>
                                                                </div>
                                                            </div>
                                                            <a href="#"
                                                                class="button quick-wiew-button">Quick
                                                                View</a>
                                                            <div
                                                                class="loop-form-add-to-cart">
                                                                <button
                                                                    class="single_add_to_cart_button button">Add
                                                                    to cart
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5
                                                        class="product-name product_title">
                                                        <a href="{{route('product',$product->slug)}}" class="text-capitalize fw-semibold">
                                                            {{ $product['name'] }}
                                                        </a>
                                                    </h5>
                                                    <div class="group-info">
                                                        <div
                                                            class="stars-rating">
                                                            <div
                                                                class="star-rating">
                                                                @for ($index = 1; $index <= 5; $index++)
                                                                    @if ($index <= (int)$overallRating[0])
                                                                        <i class="bi bi-star-fill"></i>
                                                                    @elseif ($overallRating[0] != 0 && $index <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0]))
                                                                        <i class="bi bi-star-half"></i>
                                                                    @else
                                                                        <i class="bi bi-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div
                                                                class="count-star">
                                                                ( {{count($product->reviews)}} )
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            @if(getProductPriceByType(product: $product, type: 'discount', result: 'value') > 0)
                                                                <del class="product__old-price">{{webCurrencyConverter($product->unit_price)}}</del>
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
                                                <h4
                                                    class="stelina-subtitle">Celebrate
                                                    Day Sale!</h4>
                                                <h3 class="title">Save
                                                    <span>25%</span> Of On
                                                    All<br />Items
                                                    Collection
                                                </h3>
                                                <a href="#"
                                                    class="button btn-view-promotion">Shop
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
                            <i class="fa fa-angle-double-{{Session::get('direction') === "rtl" ? 'right ml-1' : 'left mr-1 ml-n1 mt-1 '}} view-all-text"></i>
                            <a href="{{route('products',['data_from'=>'featured'])}}" class="view-all-text text-right  text-capitalize">
                                <span>{{ translate('view_all') }}</span>
                            </a>
                        </div>
                        <ul
                            class="row list-products auto-clear equal-container product-grid">
                            @foreach($featuredProductsList->take(9) as $product)
                                @php($overallRating = $product->reviews ? getOverallRating($product->reviews) : 0)
                                <li
                                    class="product-item  col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-3">
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
                                                <div
                                                    class="yith-wcwl-add-to-wishlist">
                                                    <div
                                                        class="yith-wcwl-add-button">
                                                        <a href="#"
                                                            tabindex="0">Add to
                                                            Wishlist</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="thumb-inner">
                                                <a href="{{ route('product', $product->slug) }}">
                                                    <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}" alt="">
                                                </a>
                                            </div>
                                            <a href=""
                                                class="button quick-wiew-button"
                                                tabindex="0">Quick View
                                            </a>
                                        </div>
                                        <div class="product-info">

                                            <h5
                                                class="product-name product_title">
                                                <a href="{{route('product',$product->slug)}}" class="text-capitalize fw-semibold">
                                                    {{ $product['name'] }}
                                                </a>
                                            </h5>

                                            <div class="group-info">
                                                <div class="stars-rating">
                                                    <div class="star-rating">
                                                        @for ($index = 1; $index <= 5; $index++)
                                                            @if ($index <= (int)$overallRating[0])
                                                                <i class="bi bi-star-fill"></i>
                                                            @elseif ($overallRating[0] != 0 && $index <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0]))
                                                                <i class="bi bi-star-half"></i>
                                                            @else
                                                                <i class="bi bi-star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="count-star">
                                                        ( {{count($product->reviews)}} )
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    @if(getProductPriceByType(product: $product, type: 'discount', result: 'value') > 0)
                                                        <del class="product__old-price">{{webCurrencyConverter($product->unit_price)}}</del>
                                                    @endif
                                                    <ins class="product__new-price">
                                                        {{ getProductPriceByType(product: $product, type: 'discounted_unit_price', result: 'string') }}
                                                    </ins>
                                                </div>
                                            </div>

                                            {{-- <div class="group-buttons">
                                                <div class="quantity">
                                                    <div class="control">
                                                        <a
                                                            class="btn-number qtyminus quantity-minus"
                                                            href="#">-</a>
                                                        <input type="text"
                                                            data-step="1"
                                                            data-min="0"
                                                            value="1"
                                                            title="Qty"
                                                            class="input-qty qty"
                                                            size="4">
                                                        <a href="#"
                                                            class="btn-number qtyplus quantity-plus">+</a>
                                                    </div>
                                                </div>
                                                <button
                                                    class="add_to_cart_button button"
                                                    tabindex="0">Shop
                                                    now</button>
                                            </div> --}}

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
                                            <h4
                                                class="stelina-subtitle">Jewelry
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
                                            <h4
                                                class="stelina-subtitle">Let’s
                                                us make your style!</h4>
                                            <h3 class="title">Best
                                                Collection </h3>
                                            <div class="description">
                                                A complete shopping guide on
                                                what & how to wear it!
                                            </div>
                                            <a href="#"
                                                class="button btn-shopping-us">Shop
                                                now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stelina-blog-wraap">
                <div class="container">
                    <h3 class="custommenu-title-blog">
                        {{ translate('NEWS LETTER') }}
                    </h3>
                    <div class="stelina-blog default" dir="ltr">
                        <div class="owl-slick equal-container nav-center"
                            data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":true, "infinite":true, "speed":800, "rows":1}'
                            data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":1}}]'>
                            <div
                                class="stelina-blog-item equal-element layout1">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img
                                            src="assets/images/slider-blog-thumb-1.jpg"
                                            alt="img">
                                    </a>
                                    <div class="category-blog">
                                        <ul class="list-category">
                                            <li class="category-item">
                                                <a href="#">Skincare</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-item-share">
                                        <a href="#" class="icon">
                                            <i class="fa fa-share-alt"
                                                aria-hidden="true"></i>
                                        </a>
                                        <div class="box-content">
                                            <a href="#">
                                                <i
                                                    class="fa fa-facebook"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-google-plus"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-pinterest"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="post-date">
                                            Agust 17, 09:14 am
                                        </div>
                                        <span class="view">
                                            <i class="icon fa fa-eye"
                                                aria-hidden="true"></i>
                                            631
                                        </span>
                                        <span class="comment">
                                            <i class="icon fa fa-commenting"
                                                aria-hidden="true"></i>
                                            84
                                        </span>
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="#">We bring you the best by
                                            working</a>
                                    </h2>
                                    <div class="main-info-post">
                                        <p class="des">
                                            Phasellus condimentum nulla a
                                            arcu lacinia, a venenatis ex
                                            congue.
                                            Mauris nec ante magna.
                                        </p>
                                        <a class="readmore" href="#">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="stelina-blog-item equal-element layout1">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img
                                            src="assets/images/slider-blog-thumb-2.jpg"
                                            alt="img">
                                    </a>
                                    <div class="category-blog">
                                        <ul class="list-category">
                                            <li class="category-item">
                                                <a href="#">HOW TO</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-item-share">
                                        <a href="#" class="icon">
                                            <i class="fa fa-share-alt"
                                                aria-hidden="true"></i>
                                        </a>
                                        <div class="box-content">
                                            <a href="#">
                                                <i
                                                    class="fa fa-facebook"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-google-plus"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-pinterest"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="post-date">
                                            Agust 17, 09:14 am
                                        </div>
                                        <span class="view">
                                            <i class="icon fa fa-eye"
                                                aria-hidden="true"></i>
                                            631
                                        </span>
                                        <span class="comment">
                                            <i class="icon fa fa-commenting"
                                                aria-hidden="true"></i>
                                            84
                                        </span>
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="#">We know that buying
                                            Items</a>
                                    </h2>
                                    <div class="main-info-post">
                                        <p class="des">
                                            Using Lorem Ipsum allows
                                            designers to put together
                                            layouts
                                            and the form content
                                        </p>
                                        <a class="readmore" href="#">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="stelina-blog-item equal-element layout1">
                                <div class="post-thumb">
                                    <div class="video-stelina-blog">
                                        <figure>
                                            <img
                                                src="assets/images/slider-blog-thumb-3.jpg"
                                                alt="img" width="370"
                                                height="280">
                                        </figure>
                                        <a class="quick-install" href="#"
                                            data-videosite="vimeo"
                                            data-videoid="134060140"></a>
                                    </div>
                                    <div class="category-blog">
                                        <ul class="list-category">
                                            <li class="category-item">
                                                <a href="#">VIDEO</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-item-share">
                                        <a href="#" class="icon">
                                            <i class="fa fa-share-alt"
                                                aria-hidden="true"></i>
                                        </a>
                                        <div class="box-content">
                                            <a href="#">
                                                <i
                                                    class="fa fa-facebook"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-google-plus"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-pinterest"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="post-date">
                                            Agust 17, 09:14 am
                                        </div>
                                        <span class="view">
                                            <i class="icon fa fa-eye"
                                                aria-hidden="true"></i>
                                            631
                                        </span>
                                        <span class="comment">
                                            <i class="icon fa fa-commenting"
                                                aria-hidden="true"></i>
                                            84
                                        </span>
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="#">We design functional
                                            Items</a>
                                    </h2>
                                    <div class="main-info-post">
                                        <p class="des">
                                            Risus non porta suscipit
                                            lobortis habitasse felis, aptent
                                            interdum pretium ut.
                                        </p>
                                        <a class="readmore" href="#">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="stelina-blog-item equal-element layout1">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img
                                            src="assets/images/slider-blog-thumb-4.jpg"
                                            alt="img">
                                    </a>
                                    <div class="category-blog">
                                        <ul class="list-category">
                                            <li class="category-item">
                                                <a href="#">Skincare</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-item-share">
                                        <a href="#" class="icon">
                                            <i class="fa fa-share-alt"
                                                aria-hidden="true"></i>
                                        </a>
                                        <div class="box-content">
                                            <a href="#">
                                                <i
                                                    class="fa fa-facebook"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-google-plus"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-pinterest"></i>
                                            </a>
                                            <a href="#">
                                                <i
                                                    class="fa fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="post-date">
                                            Agust 17, 09:14 am
                                        </div>
                                        <span class="view">
                                            <i class="icon fa fa-eye"
                                                aria-hidden="true"></i>
                                            631
                                        </span>
                                        <span class="comment">
                                            <i class="icon fa fa-commenting"
                                                aria-hidden="true"></i>
                                            84
                                        </span>
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="#">We know that buying
                                            Items</a>
                                    </h2>
                                    <div class="main-info-post">
                                        <p class="des">
                                            Class integer tellus praesent at
                                            torquent cras, potenti erat
                                            fames
                                            volutpat etiam.
                                        </p>
                                        <a class="readmore" href="#">Read
                                            more</a>
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
            <h3 class="custommenu-title-blog">
                <i class="flaticon-instagram" aria-hidden="true"></i>
                {{ translate('Instagram Feed') }}
            </h3>
            <div class="stelina-instagram">
                <div class="instagram owl-slick equal-container"
                    data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":false, "infinite":true, "speed":800, "rows":1}'
                    data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":5}},{"breakpoint":"1200","settings":{"slidesToShow":4}},{"breakpoint":"992","settings":{"slidesToShow":3}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":2}}]'>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-1.jpg"
                                alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-instagram"
                                aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-2.jpg"
                                alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-instagram"
                                aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-3.jpg"
                                alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-instagram"
                                aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-4.jpg"
                                alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-instagram"
                                aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-5.jpg"
                                alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-instagram"
                                aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

