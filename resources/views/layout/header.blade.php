<script src="https://kit.fontawesome.com/67ff6e11b9.js" crossorigin="anonymous"></script>
<!-- Header -->
<div class="tm-header tm-header-sticky">

    <!-- Header Top Area -->
    <div class="tm-header-toparea bg-black">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-12">
                    <ul class="tm-header-info">
                        <li><a href="tel:123456789"><i class="ion-ios-telephone"></i>1900 111 999 </a></li>
                        <li><a href="mailto:contact@example.com"><i class="ion-android-mail"></i>Luxury</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="tm-header-options">
                        <div class="tm-dropdown tm-header-links">
                            <button><i class="fa-regular fa-user"></i></button>
                            <ul>
                                @if (Route::has('login'))
                                    @auth
                                        @if (!isset($_SESSION))
                                            <?php session_start(); ?>
                                            <li>{{ $_SESSION['user_id'] }}</li>
                                        @endif
                                        @if (isset($_SESSION['user_id']))
                                            <?php $order = DB::table('orders')
                                                ->join('order_product', 'orders.id', '=', 'order_product.order_id')
                                                ->where('order_status', 0)
                                                ->where('user_id', $_SESSION['user_id'])
                                                ->get(); ?>
                                            <li><a href="{{ url('user/' . $_SESSION['user_id']) }}">@lang('lang.tkcuatoi')</a>
                                            </li>
                                        @endif
                                        <?php $wishlist = DB::table('wishlists')
                                            ->where('user_id', [$_SESSION['user_id']])
                                            ->get(); ?>
                                        <li> <a href="{{ route('logout') }}">
                                                @lang('lang.dangxuat')
                                            </a></li>
                                    @else
                                        <?php $wishlist = []; ?>
                                        <?php $order = []; ?>
                                        <li><a href="{{ route('login') }}"> @lang('lang.dangnhap')</a></li>
                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}"> @lang('lang.dangky')</a></li>
                                        @endif
                                    @endauth
                                @endif
                                <li><a href="{{ url('order') }}"> @lang('lang.giohang')</a></li>
                                <li><a href="{{ url('wishlist   ') }}"> @lang('lang.dsyeuthich')</a></li>
                                <li><a href="{{ url('purchase') }}">Purchase history</a></li>
                            </ul>
                        </div>

                        <div class="tm-dropdown tm-header-currency">
                            <button>USD</button>
                            <ul>
                                <li><a href="#">USD</a></li>
                                <li><a href="#">EUR</a></li>
                                <li><a href="#">JPY</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </div>
                        <div class="tm-dropdown tm-header-language">
                            <button id="languageButton"><img src="{{ asset('images/flag-english.png') }}"
                                    alt="language">English</button>
                            <ul>
                                <li><a href="{{ url('lang/en') }}"><img src="{{ asset('images/flag-english.png') }}"
                                            alt="language" id="language">English</a></li>
                                <li><a href="{{ url('lang/vi') }}"><img src="{{ asset('images/flag-vietnam.png') }}"
                                            alt="language" width=16px; id="language">Tiếng Việt</a></li>
                            </ul>
                        </div>

                        <script>
                            const languageButton = document.getElementById('languageButton');
                            const languageLinks = document.querySelectorAll('.tm-header-language ul li a');

                            languageLinks.forEach(link => {
                                link.addEventListener('click', () => {

                                    const selectedLanguage = link.innerText;

                                    languageButton.innerHTML = link.innerHTML;
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Header Top Area -->

    <!-- Header Middle Area -->
    <div class="tm-header-middlearea bg-white">
        <div class="container">
            <div class="tm-mobilenav"></div>
            <div class="row align-items-center">
                <div class="col-lg-3 col-6 order-1 order-lg-1">
                    <a href="{{ url('/home') }}" class="tm-header-logo">
                        <img src="{{ asset('images/logo.png') }}" alt="surose">
                    </a>
                </div>
                <div class="col-lg-6 col-12 order-3 order-lg-2">
                    <form class="tm-header-search" action="{{ url('/searchProduct') }}" method="GET">
                        @csrf
                         <input type="text" name="keyword" placeholder="@lang('lang.search')" required> 
                        <button><i class="ion-android-search"></i></button>
                    </form>
                </div>
                <div class="col-lg-3 col-6 order-2 order-lg-3">
                    <ul class="tm-header-icons">
                        <li><a href="{{ url('wishlist') }}"><i
                                    class="ion-android-favorite-outline"></i><span>{{ count($wishlist) }}</span></a>
                        </li>
                        <li><a href="{{ url('order') }}"><i class="ion-bag"></i><span>{{ count($order) }}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--// Header Middle Area -->

    <!-- Header Bottom Area -->
    <div class="tm-header-bottomarea bg-white">
        <div class="container">
            <nav class="tm-header-nav">
                <ul>
                    <li><a href="{{ url('/home') }}">@lang('lang.trangchu')</a></li>
                    <li><a href="{{ url('/shop') }}">@lang('lang.nhancuoi')</a></li>
                    <li><a href="{{ url('/shopproducts') }}">@lang('lang.nhancauhon')</a></li>
                    <li><a href="{{ url('/contact') }}">@lang('lang.contact')</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!--// Header Bottom Area -->

</div>

<!--// Header -->
