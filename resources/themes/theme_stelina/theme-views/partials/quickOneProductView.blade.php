
@php use App\Utils\Helpers; @endphp

<div class="kt-popup-quickview" style="direction: ltr !important">
    {{-- image --}}
    <div class="details-thumb">
        @if($product->images!=null && count($product->images_full_url)>0)
            <div class="slider-product slider-for">
                @if(json_decode($product->colors) && $product->color_images_full_url)
                    @foreach ($product->color_images_full_url as $key => $photo)
                        <div class="details-item">
                            <a href="{{$photo['image_name']['path']}}">
                                <img style="width: 100% !important; max-height: 360px;" src="{{ getStorageImages(path: $photo['image_name'], type:'product') }}" alt="img">
                            </a>
                        </div>
                    @endforeach
                @else
                    @foreach ($product->images_full_url as $key => $photo)
                        <div class="details-item">
                            <a href="{{ getStorageImages(path: $photo, type: 'product') }}">
                                <img style="width: 100% !important; max-height: 360px;" src="{{ getStorageImages(path: $photo, type: 'product') }}" alt="img">
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
    {{-- details --}}
    <div class="details-infor">
        <h1 class="product-title">{{$product['name']}}</h1>
        <div class="stars-rating">
            <div class="star-rating">
                @php($overallRating = $product->reviews ? getOverallRating($product->reviews) : 0)
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
            <span>({{ count($product->reviews) }})</span>
        </div>
        <div class="availability">{{ translate("availability") }}:
            @if(($product['product_type'] == 'physical') && ($product['current_stock']<=0))
                <a>{{translate('out_of_stock')}}</a>
            @else
                @if($product['product_type'] === 'physical')
                    <a >({{$product->current_stock}}) {{translate('in_Stock')}}</a>
                @endif
            @endif
        </div>
        <div class="price">
            <span>
                {!! getPriceRangeWithDiscount(product: $product) !!}
            </span>
        </div>

        <div class="group-button">
            <div class="yith-wcwl-add-to-wishlist">
                <div class="yith-wcwl-add-button">
                    @if($web_config['guest_checkout_status'] || auth('customer')->check())
                        <a href="javascript:void(0);"
                            data-product-id="{{ $product->id }}"
                            data-url="{{ route('store-wishlist') }}"
                            class="wishlist-cart-toggle {{ isProductInWishList($product->id) ? 'in-wishlist-cart' : 'not-in-wishlist' }}">
                            Add to Wishlist
                        </a>
                    @else
                        <a href="{{ route('customer.auth.login') }}">
                            Add to Wishlist
                        </a>
                    @endif
                </div>
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

<script>
    $(document).on('click', '.wishlist-cart-toggle', function (e) {
        e.preventDefault();

        let $this = $(this);
        let url = $this.data('url');
        let productId = $this.data('product-id');

        $.post(url, {
            product_id: productId,
            _token: '{{ csrf_token() }}'
        }, function () {
            // Toggle classes
            $this.toggleClass('in-wishlist-cart not-in-wishlist');
            $('.product-item .yith-wcwl-add-to-wishlist > div a').toggleClass('in-wishlist not-in-wishlist');
        });
    });
</script>

