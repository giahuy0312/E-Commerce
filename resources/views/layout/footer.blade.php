<script src="https://kit.fontawesome.com/67ff6e11b9.js" crossorigin="anonymous"></script>

<!-- Footer -->
<div class="tm-footer">

    <!-- Instagram Photos -->
    <ul id="instafeed" class="tm-instaphotos"></ul>
    <!--// Instagram Photos -->

    <!-- Footer Top Area -->
    <div class="tm-footer-toparea tm-padding-section">
        <div class="container">
            <div class="widgets widgets-footer row">

                <!-- Single Widget -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-widget widget-info">
                        <a class="widget-info-logo" href="{{ url('index') }}"><img src="{{ asset('images/logo.png') }}"
                                alt="logo"></a>
                        <ul>
                            <li><b>@lang('lang.diachi') :</b>72 Nguyen Cu Trinh, Pham Ngu Lao Ward, District 1</li>
                            <li><b>@lang('lang.sdt') :</b><a href="tel:123456789">1900 111 999</a></li>
                            <li><b>@lang('lang.email') :</b><a href="mailto:info@example.com">luxury@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <!--// Single Widget -->

                <!-- Single Widget -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-widget widget-quicklinks">
                        <h6 class="widget-title">@lang('lang.vechungtoi')</h6>
                        <ul>
                            <li><a href="#">@lang('lang.vechungtoi')</a></li>
                            <li><a href="#">@lang('lang.cauchuyen')</a></li>
                            <li><a href="#">@lang('lang.tuyendung')</a></li>
                        </ul>
                    </div>
                </div>
                <!--// Single Widget -->

                <!-- Single Widget -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-widget widget-quicklinks">
                        <h6 class="widget-title">@lang('lang.tkcuatoi')</h6>
                        <ul>
                            @if (isset($_SESSION['user_id']))           
                                <li><a href="{{ url('user/'. $_SESSION['user_id']) }}">@lang('lang.tkcuatoi')</a></li>
                            @endif
                            <li><a href="{{ url('order') }}">@lang('lang.giohang')</a></li>
                            <li><a href="wishlist.html">@lang('lang.dsyeuthich')</a></li>
                            <li><a href="#">@lang('lang.bantin')</a></li>
                            <li><a href="#"> @lang('lang.thutucthanhtoan')</a></li>
                            <li><a href="#"> @lang('lang.cauhoithuonggap')</a></li>
                        </ul>
                    </div>
                </div>
                <!--// Single Widget -->

                <!-- Single Widget -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-widget widget-newsletter">
                        <h6 class="widget-title">@lang('lang.phanhoi')</h6>
                        <form id="tm-mailchimp-form" class="widget-newsletter-form">
                            <input id="mc-email" type="text" placeholder="@lang('lang.nhapmail')">
                            <button id="mc-submit" type="submit" class="tm-button">@lang('lang.gui')
                                <b></b></button>
                        </form>
                        <!-- Mailchimp Alerts -->
                        <div class="tm-mailchimp-alerts">
                            <div class="tm-mailchimp-submitting"></div>
                            <div class="mailchimp-success"></div>
                            <div class="tm-mailchimp-error"></div>
                        </div>
                        <!--// Mailchimp Alerts -->
                    </div>
                </div>
                <!--// Single Widget -->

            </div>
        </div>
    </div>
    <!--// Footer Top Area -->

    <!-- Footer Bottom Area -->
    <div class="tm-footer-bottomarea">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <p class="tm-footer-copyright">©
                        2023. Designed by <a href="#">@lang('lang.nhom') L</a></p>
                </div>
                <div class="col-md-5">
                    <div class="tm-footer-payment">
                        <img src="{{ asset('images/payment-methods.png') }}" alt="payment methods">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Footer Bottom Area -->

</div>
<!--// Footer -->
