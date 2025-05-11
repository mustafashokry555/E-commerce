<footer class="footer style7">
    <div class="container">
        <div class="container-wapper">
            <div class="row">
                <div
                    class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-sm hidden-md hidden-lg">
                    <div class="stelina-newsletter style1">
                        <div class="newsletter-head">
                            <h3 class="title">{{ translate('newsletter')}}</h3>
                        </div>
                        <div class="newsletter-form-wrap">
                            <div class="list">
                                {{ translate('subscribe_to_our_new_channel_to_get_latest_updates')}}
                            </div>
                            <input type="email"
                                class="input-text email email-newsletter"
                                placeholder="{{ translate('your_Email_Address')}}">
                            <button
                                class="button btn-submit submit-newsletter">{{ translate('subscribe')}}</button>
                        </div>
                    </div>
                </div>
                <div
                    class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="stelina-custommenu default">
                        <h2 class="widgettitle">{{ translate('special')}}</h2>
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="#">{{ translate('latest_products')}}</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">{{ translate('top_rated_product')}}</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">{{ translate('best_selling_product')}}</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">{{ translate('featured_products')}}</a>
                            </li>
                            {{-- <li class="menu-item">
                                <a href="#">{{ translate('flash_deal')}}</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div
                    class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs">
                    <div class="stelina-newsletter style1">
                        <div class="newsletter-head">
                            <h3 class="title">{{ translate('newsletter')}}</h3>
                        </div>
                        <div class="newsletter-form-wrap">
                            <div class="list">
                                {{ translate('subscribe_to_our_new_channel_to_get_latest_updates')}}
                            </div>
                        <form class="newsletter-form" action="{{ route('subscription') }}" method="post">
                            @csrf
                            <input type="text" name="subscription_email" required
                                class="input-text email email-newsletter"
                                placeholder="{{ translate('enter_your_email') }}">
                            <button type="submit" class="button btn-submit submit-newsletter">
                                {{ translate('subscribe')}}
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
                <div
                    class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="stelina-custommenu default">
                        <h2 class="widgettitle">{{ translate('account_&_shipping_info')}}</h2>
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="#">{{ translate('profile_info')}}</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">{{ translate('Shipping_Policy')}}</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">{{ translate('track_order')}}</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">{{ translate('return_policy')}}</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">{{ translate('cancellation_policy')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-end">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="stelina-socials">
                            <ul class="socials">
                                <li>
                                    <a href="#" class="social-item"
                                        target="_blank">
                                        <i
                                            class="icon fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-item"
                                        target="_blank">
                                        <i
                                            class="icon fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-item"
                                        target="_blank">
                                        <i
                                            class="icon fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="coppyright">
                            {{ $web_config['copyright_text'] }}
                            {{-- Copyright © 2020
                            <a href="#">Stelina</a>
                            . All rights reserved --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="footer-device-mobile">
    <div class="wapper">
        <div class="footer-device-mobile-item device-home">
            <a href="index.html">
                <span class="icon">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </span>
                Home
            </a>
        </div>
        <div
            class="footer-device-mobile-item device-home device-wishlist">
            <a href="#">
                <span class="icon">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </span>
                Wishlist
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-cart">
            <a href="#">
                <span class="icon">
                    <i class="fa fa-shopping-basket"
                        aria-hidden="true"></i>
                    <span class="count-icon">
                        0
                    </span>
                </span>
                <span class="text">Cart</span>
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-user">
            <a href="login.html">
                <span class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                Account
            </a>
        </div>
    </div>
</div>
