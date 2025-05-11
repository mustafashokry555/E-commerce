{{-- <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
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
<link rel="stylesheet" href="{{ theme_asset('assets/new_them/css/style.css') }}"> --}}
@php use App\Utils\Helpers; @endphp
<div class="kt-popup-quickview" style="direction: ltr !important">
    <div class="details-thumb">
        @if($product->images!=null && count($product->images_full_url)>0)
            <div class="slider-product slider-for">
                @if(json_decode($product->colors) && $product->color_images_full_url)
                    @foreach ($product->color_images_full_url as $key => $photo)
                        <div class="details-item">
                            <a href="{{$photo['image_name']['path']}}">
                                <img style="width: 100%" src="{{ getStorageImages(path: $photo['image_name'], type:'product') }}" alt="img">
                            </a>
                        </div>
                    @endforeach
                @else
                    @foreach ($product->images_full_url as $key => $photo)
                        <div class="details-item">
                            <a href="{{ getStorageImages(path: $photo, type: 'product') }}">
                                <img src="{{ getStorageImages(path: $photo, type: 'product') }}" alt="img">
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        @endif

        @if($product->images!=null && count($product->images_full_url)>0)
            <div class="slider-product-button slider-nav nav-center">
                @if(json_decode($product->colors) && $product->color_images_full_url)
                    @foreach ($product->color_images_full_url as $key => $photo)
                        <div class="details-item">
                            <img src="{{ getStorageImages(path:$photo['image_name'], type: 'product') }}" alt="img">
                        </div>
                    @endforeach
                @else
                    @foreach ($product->images_full_url as $key => $photo)
                        <div class="details-item">
                            <img src="{{ getStorageImages(path: $photo, type:'product') }}" alt="img">
                        </div>
                    @endforeach
                @endif
            </div>
        @endif
    </div>
    <div class="details-infor">
        <h1 class="product-title">Glorious Eau</h1>
        <div class="stars-rating">
            <div class="star-rating"><span class="star-5"></span></div>
            <div class="count-star">(7)</div>
        </div>
        <div class="availability">availability:<a href="#">in Stock</a></div>
        <div class="price"><span>€45</span></div>
        <div class="product-details-description">
            <ul>
                <li>Vestibulum tortor quam</li>
                <li>Imported</li>
                <li>Art.No. 06-7680</li>
            </ul>
        </div>
        <div class="variations">
            <div class="attribute attribute_color">
                <div class="color-text text-attribute">
                    Color:<span>White/</span><span>Black/</span><span>Teal/</span><span>Brown</span></div>
                <div class="list-color list-item"><a href="#" class="color1"></a><a href="#"
                        class="color2"></a><a href="#" class="color3 active"></a><a href="#"
                        class="color4"></a></div>
            </div>
            <div class="attribute attribute_size">
                <div class="size-text text-attribute">Pots Size:</div>
                <div class="list-size list-item"><a href="#" class="">xs</a><a href="#"
                        class="">s</a><a href="#" class="active">m</a><a href="#"
                        class="">l</a><a href="#" class="">xl</a><a href="#"
                        class="">xxl</a></div>
            </div>
        </div>
        <div class="group-button">
            <div class="yith-wcwl-add-to-wishlist">
                <div class="yith-wcwl-add-button"><a href="#">Add to Wishlist</a></div>
            </div>
            <div class="size-chart-wrapp">
                <div class="btn-size-chart"><a id="size_chart" href="assets/images/size-chart.jpg" class="fancybox"
                        target="_blank">View Size Chart</a></div>
            </div>
            <div class="quantity-add-to-cart">
                <div class="quantity">
                    <div class="control"><a class="btn-number qtyminus quantity-minus" href="#">-</a><input
                            type="text" data-step="1" data-min="0" value="1" title="Qty"
                            class="input-qty qty" size="4"><a href="#"
                            class="btn-number qtyplus quantity-plus">+</a></div>
                </div><button class="single_add_to_cart_button button">Add to cart</button>
            </div>
        </div>
    </div>
</div>
{{--

@include('theme-views.layouts.new_partials._translate-text-for-js')
@include('theme-views.layouts.main-new-script') --}}
