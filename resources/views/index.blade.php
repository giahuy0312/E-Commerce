@extends('layout.main')

@if (!isset($_SESSION['order_id']))
    <?php $_SESSION['order_id'] = 0; ?>
@endif

@if (isset($_SESSION['user_id']))
    @foreach ($orders as $order)
        @if ($order->user_id == $_SESSION['user_id'])
            @if ($order->order_status == 0)
                <?php $_SESSION['order_id'] = $order->id; ?>
            @endif
        @endif
    @endforeach
@endif

@section('content')

    @include('layout.header')

    <!-- Heroslider Area -->
    <div class="tm-heroslider-area bg-grey">
        <div class="tm-heroslider-slider">

            <!-- Heroslider Item -->
            <div class="tm-heroslider" data-bgimage="{{ asset('images') }}/banner.png" style="height: 295px;">
                <div class="container" style="margin-top: 180px;">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-8 col-12">
                            <div class="tm-heroslider-contentwrapper">
                                <div class="tm-heroslider-content">
                                    <h1>@lang('lang.heroslider1')</h1>
                                    <p>@lang('lang.heroslider2')</p>
                                    <a href="products.html" class="tm-button">@lang('lang.btnmua')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Heroslider Item -->

            <!-- Heroslider Item -->
            <div class="tm-heroslider" data-bgimage="{{ asset('images') }}/banner1.png" style="height: 295px;">
                <div class="container" style="margin-top: 180px;">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-8 col-12">
                            <div class="tm-heroslider-contentwrapper">
                                <div class="tm-heroslider-content">
                                    <h1>@lang('lang.heroslider1')</h1>
                                    <p>@lang('lang.heroslider2')</p>
                                    <a href="products.html" class="tm-button">@lang('lang.btnmua')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Heroslider Item -->

        </div>
    </div>
    <!--// Heroslider Area -->

    <!-- Page Content -->
    <main class="page-content">

        <!-- Features Area -->
        <div class="tm-section tm-feature-area bg-grey">
            <div class="container">
                <div class="row mt-20-reverse">

                    <!-- Single Feature -->
                    @if (count($products) >= 3)
                        @for ($i = 0; $i < 3; $i++)
                            <div class="col-lg-4 mt-30">
                                <div class="tm-feature">
                                    @if (isset($products))
                                        <span class="tm-feature-icon">
                                            <img src="{{ asset('images/image-products') }}/{{ $products[$i]->image }}"
                                                alt="free shipping">
                                        </span>
                                        <div class="tm-feature-content">
                                            <h6>@lang('lang.feature-cont1')</h6>
                                            <p>@lang('lang.feature-cont1.1')</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--// Single Feature -->

                            <!-- Single Feature -->
                            <div class="col-lg-4 mt-30">
                                <div class="tm-feature">
                                    <span class="tm-feature-icon">
                                        <img src="{{ asset('images/icons/icon-fast-delivery.png') }}" alt="fast delivery">
                                    </span>
                                    <div class="tm-feature-content">
                                        <h6>@lang('lang.feature-cont2')</h6>
                                        <p>@lang('lang.feature-cont2.1')</p>
                                    </div>
                                </div>
                            </div>
                            <!--// Single Feature -->

                            <!-- Single Feature -->
                            <div class="col-lg-4 mt-30">
                                <div class="tm-feature">
                                    <span class="tm-feature-icon">
                                        <img src="{{ asset('images/icons/icon-247-support.png') }}" alt="24/7 Support">
                                    </span>
                                    <div class="tm-feature-content">
                                        <h6>@lang('lang.feature-cont3')</h6>
                                        <p>@lang('lang.feature-cont3.1') </p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                </div>
                <!--// Single Feature -->

            </div>
        </div>
        @endif
        <!--// Single Feature -->

        </div>
        </div>
        </div>
        <!--// Features Area -->

        <!-- Popular Products Area -->
        <div id="tm-popular-products-area" class="tm-section tm-popular-products-area tm-padding-section bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="tm-sectiontitle text-center">
                            <h3>@lang('lang.sectiontitle1')</h3>
                            <p>@lang('lang.sectiontitle')</p>
                        </div>
                    </div>
                </div>
                <div class="row tm-products-slider">

                    <!-- Single Product -->
                    @if (isset($products))
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="tm-product tm-scrollanim">
                                    <div class="tm-product-topside">
                                        <div class="tm-product-images">
                                            <img src="{{ asset('images/image-products') }}/{{ $product->image }}"
                                                alt="product image">
                                        </div>
                                        <ul class="tm-product-actions">
                                            @if (isset($_SESSION['user_id']))
                                            <li><a href="{{ route('order.add', [$_SESSION['order_id'], $product->id]) }}"><i
                                                class="ion-android-cart"></i> @lang('lang.addcart')</a>
                                    </li>
                                            @else
                                            <li><a href="{{ route('login') }}"><i
                                                class="ion-android-cart"></i> @lang('lang.addcart')</a>
                                    </li>
                                            @endif
                                           
                                            <li><button data-fancybox data-src="#tm-product-quickview"><i
                                                        class="ion-eye"></i></button></li>
                                            @if (isset($_SESSION['user_id']))
                                                <li><button><a
                                                            href="{{ route('addwishlist', [$_SESSION['user_id'], $product->id]) }}"><i
                                                                class="ion-heart"></i></a></button>
                                                </li>
                                            @else
                                                <li><button><a href="{{ route('login') }}"><i
                                                                class="ion-heart"></i></a></button>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="tm-product-badges">
                                            <span class="tm-product-badges-new">@lang('lang.moi')</span>
                                            <span class="tm-product-badges-sale">@lang('lang.sale')</span>
                                        </div>
                                    </div>
                                    <div class="tm-product-bottomside">
                                        <h6 class="tm-product-title"><a
                                                href="{{ route('productDetails', $product->id) }}">{{ $product->name }}</a>
                                        </h6>
                                        <span class="tm-product-price">{{ $product->price }}</span>
                                        <div class="tm-product-content">
                                            <p></p>
                                            <ul class="tm-product-actions">
                                                <li><a href="#"><i class="ion-android-cart"></i>
                                                        @lang('lang.addcart')</a>
                                                </li>
                                                <li><button data-fancybox data-src="#tm-product-quickview"><i
                                                            class="ion-eye"></i></button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!--// Single Product -->

                </div>
            </div>
        </div>
        <!--// Popular Products Area -->

        <!-- Banners Area -->

        <!-- Banners Area -->
        <div class="tm-section tm-banners-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="tm-sectiontitle text-center">
                            <h3>@lang('lang.sectiontitle2')</h3>
                            <p>@lang('lang.sectiontitle')</p>
                        </div>
                    </div>
                    <!--// Single Banner -->

                </div>
                <div class="row mt-30-reverse">
                    <!-- Single Banner -->
                    @if (count($products) >= 3)
                        @for ($i = 0; $i < 3; $i++)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-30">
                                <a href="#" class="tm-banner tm-scrollanim">
                                    @if (isset($products))
                                        <img src="{{ asset('images/image-products') }}/{{ $products[$i]->image }}"
                                            alt="banner image">
                                    @endif
                                </a>
                            </div>
                        @endfor
                    @endif
                    <!--// Single Banner -->
                </div>
                <div class="tm-section tm-banners-area">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-12">
                                <div class="tm-sectiontitle text-center">
                                    <h3>@lang('lang.sectiontitle2')</h3>
                                    <p>@lang('lang.sectiontitle')</p>
                                </div>
                            </div>
                            <!--// Single Banner -->

                        </div>
                        <div class="row mt-30-reverse">
                            <!-- Single Banner -->
                            @if (count($products) >= 3)
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-30">
                                        <a href="#" class="tm-banner tm-scrollanim">
                                            @if (isset($products))
                                                <img src="{{ asset('images/image-products') }}/{{ $products[$i]->image }}"
                                                    alt="banner image">
                                            @endif
                                        </a>
                                    </div>
                                @endfor
                            @endif
                            <!--// Single Banner -->
                        </div>
                    </div>
                </div>
                <!--// Banners Area -->

                <!-- Popular Products Area -->
                <div id="tm-latest-products-area" class="tm-section tm-latest-products-area tm-padding-section bg-white">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-12">
                                <div class="tm-sectiontitle text-center">
                                    <h3>@lang('lang.sectiontitle2')</h3>
                                    <p>@lang('lang.sectiontitle')</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-50-reverse">

                            <!-- Single Product -->
                            @if (isset($products))
                                @foreach ($products as $product)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
                                        <div class="tm-product tm-scrollanim">
                                            <div class="tm-product-topside">
                                                <div class="tm-product-images">
                                                    <img src="{{ asset('images/image-products') }}/{{ $product->image }}"
                                                        alt="product image">
                                                    <img src="{{ asset('images/image-products') }}/{{ $product->image }}"
                                                        alt="product image">
                                                </div>
                                                <ul class="tm-product-actions">
                                                    <li><a href="#"><i class="ion-android-cart"></i>
                                                            @lang('lang.addcart')</a>
                                                    </li>
                                                    <li><button data-fancybox data-src="#tm-product-quickview"><i
                                                                class="ion-eye"></i></button></li>
                                                    <li><a href="#"><i class="ion-heart"></i></a></li>
                                                </ul>
                                                <div class="tm-product-badges">
                                                    <span class="tm-product-badges-new">@lang('lang.moi')</span>
                                                </div>
                                            </div>
                                            <div class="tm-product-bottomside">
                                                <h6 class="tm-product-title"><a
                                                        href="{{route('productDetails', $product->id)}}">{{ $product->name }}</a></h6>
                                                <span class="tm-product-price">{{ $product->price }}</span>
                                                <div class="tm-product-content">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry.
                                                        Lorem
                                                        Ipsum has been the industry's standard dummy text ever since the
                                                        when an unknown printer took a galley of type and scrambled it to
                                                        make a
                                                        type specimen book. It has survived not only five centuries, but
                                                        also
                                                        the
                                                        leap into electronic typesetting.</p>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="#"><i
                                                                    class="ion-android-cart"></i>@lang('lang.addcart')</a>
                                                        </li>
                                                        <li><button data-fancybox data-src="#tm-product-quickview"><i
                                                                    class="ion-eye"></i></button></li>
                                                        <li><a href="#"><i class="ion-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <!--// Single Product -->
                        </div>
                        <div class="tm-product-loadmore text-center mt-50">
                            <a href="products.html" class="tm-button"> @lang('lang.allproduct')</a>
                        </div>
                    </div>
                </div>
                <!--// Popular Products Area -->

                <!-- Offer Area -->

                <!--// Offer Area -->

                <!-- Latest Blogs Area -->
                <div id="tm-news-area" class="tm-section tm-blog-area tm-padding-section bg-pattern-transparent">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-12">
                                <div class="tm-sectiontitle text-center">
                                    <h3>@lang('lang.sectiontitle3')</h3>
                                    <p>@lang('lang.sectiontitle3.1')</p>
                                </div>
                            </div>
                        </div>
                        <div class="row tm-blog-slider">

                            <!-- Blog Single Item -->
                            @if (isset($products))
                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="tm-blog tm-scrollanim">
                                            <div class="tm-blog-topside">
                                                <div class="tm-blog-thumb">
                                                    <img src="{{ asset('images/image-products') }}/{{ $product->image }}"
                                                        alt="blog image">
                                                </div>
                                                <span class="tm-blog-metahighlight"><span>Apr</span>17</span>
                                            </div>
                                            <div class="tm-blog-content">
                                                <h6 class="tm-blog-title"><a href="blog-details.html">
                                                        @lang('lang.blog-title')
                                                    </a></h6>
                                                <ul class="tm-blog-meta">
                                                    <li><a href="blog.html"><i
                                                                class="ion-android-person">@lang('lang.blog-meta1')</i> </a>
                                                    </li>
                                                    <li><a href="blog-details.html"><i class="ion-chatbubbles"></i>
                                                            @lang('lang.blog-meta2') </a>
                                                    </li>
                                                </ul>
                                                <a href="blog-details.html" class="tm-readmore">@lang('lang.readmore')</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <!--// Blog Single Item -->

                        </div>
                    </div>
                </div>
                <!--// Latest Blogs Area -->

                <!-- Brand Logos -->
                <div class="tm-section tm-brandlogo-area tm-padding-section bg-grey">
                    <div class="container">
                        <div class="row tm-brandlogo-slider" style="height:100px">

                            <!-- Brang Logo Single -->
                            @if (isset($products))
                                @foreach ($products as $product)
                                    <div class="col-12 tm-brandlogo" style="height: 240px;">
                                        <a href="#">
                                            <img src="{{ asset('images/image-products') }}/{{ $product->image }}"
                                                alt="brand-logo">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                            <!--// Brang Logo Single -->

                        </div>
                    </div>
                </div>
                <!--// Brand Logos -->

    </main>
    <!--// Page Content -->

    @include('layout.footer')

    <!-- Product Quickview -->
    <div class="tm-product-quickview" id="tm-product-quickview">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 col-12">
                    <div class="tm-product-quickview-inner">

                        <!-- Product Details -->
                        <div class="tm-prodetails">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-10 col-12">
                                    <div class="tm-prodetails-images">
                                        <div class="tm-prodetails-largeimages">
                                            <div class="tm-prodetails-largeimage">
                                                <img src="{{ asset('images/products') }}/product-image-1.jpg"
                                                    alt="product image">
                                            </div>
                                            <div class="tm-prodetails-largeimage">
                                                <img src="{{ asset('images/products') }}/product-image-2.jpg"
                                                    alt="product image">
                                            </div>
                                            <div class="tm-prodetails-largeimage">
                                                <img src="{{ asset('images/products') }}/product-image-3.jpg"
                                                    alt="product image">
                                            </div>
                                            <div class="tm-prodetails-largeimage">
                                                <img src="{{ asset('images/products') }}/product-image-4.jpg"
                                                    alt="product image">
                                            </div>
                                            <div class="tm-prodetails-largeimage">
                                                <img src="{{ asset('images/products') }}/product-image-6.jpg"
                                                    alt="product image">
                                            </div>
                                            <div class="tm-prodetails-largeimage">
                                                <img src="{{ asset('images/products') }}/product-image-6.jpg"
                                                    alt="product image">
                                            </div>
                                        </div>
                                        <div class="tm-prodetails-thumbnails">
                                            <div class="tm-prodetails-thumbnail">
                                                <img src="{{ asset('images/products') }}/product-image-1-thumb.jpg"
                                                    alt="product image">
                                            </div>
                                            <div class="tm-prodetails-thumbnail">
                                                <img src="{{ asset('images/products') }}/product-image-2-thumb.jpg"
                                                    alt="product image">
                                            </div>
                                            <div class="tm-prodetails-thumbnail">
                                                <img src="{{ asset('images/products') }}/product-image-3-thumb.jpg"
                                                    alt="product image">
                                            </div>
                                            <div class="tm-prodetails-thumbnail">
                                                <img src="{{ asset('images/products') }}/product-image-4-thumb.jpg"
                                                    alt="product image">
                                            </div>
                                            <div class="tm-prodetails-thumbnail">
                                                <img src="{{ asset('images/products') }}/product-image-5-thumb.jpg"
                                                    alt="product image">
                                            </div>
                                            <div class="tm-prodetails-thumbnail">
                                                <img src="{{ asset('images/products') }}/product-image-6-thumb.jpg"
                                                    alt="product image">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="tm-prodetails-content">
                                        <h4 class="tm-prodetails-title">@lang('lang.prodetails-title')</h4>
                                        <span class="tm-prodetails-price"><del>$75.99</del> $59.99</span>
                                        <div class="tm-ratingbox">
                                            <span class="is-active"><i class="ion-android-star-outline"></i></span>
                                            <span class="is-active"><i class="ion-android-star-outline"></i></span>
                                            <span class="is-active"><i class="ion-android-star-outline"></i></span>
                                            <span class="is-active"><i class="ion-android-star-outline"></i></span>
                                            <span><i class="ion-android-star-outline"></i></span>
                                        </div>
                                        <div class="tm-prodetails-infos">
                                            <div class="tm-prodetails-singleinfo">
                                                <b> @lang('lang.prodetails-id') </b>010
                                            </div>
                                            <div class="tm-prodetails-singleinfo">
                                                <b>@lang('lang.prodetails-cate') </b><a href="#">@lang('lang.prodetails-cate-name')</a>
                                            </div>
                                            <div class="tm-prodetails-singleinfo tm-prodetails-tags">
                                                <b> @lang('lang.prodetails-tags') : </b>
                                                <ul>
                                                    <li><a href="#"> @lang('lang.prodetails-tags1')</a></li>
                                                    <li><a href="#"> @lang('lang.prodetails-tags2')</a></li>
                                                    <li><a href="#"> @lang('lang.prodetails-tags3')</a></li>
                                                    <li><a href="#"> @lang('lang.prodetails-tags4')</a></li>
                                                </ul>
                                            </div>
                                            <div class="tm-prodetails-singleinfo">
                                                <b>@lang('lang.prodetails-avail') : </b>
                                                <span class="color-theme">@lang('lang.prodetails-avail1')</span>
                                            </div>
                                            <div class="tm-prodetails-singleinfo tm-prodetails-share">
                                                <b>@lang('lang.prodetails-share') : </b>
                                                <ul>
                                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-social-skype-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-social-pinterest-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis quemi
                                            dolor, malesuada id metus a, mattis eleifend elit. Nullam pharetra
                                            consequat ex in dapibus. Vestibulum ante ipsum primis in faucibus
                                            orciluctus curae.</p>
                                        <div class="tm-prodetails-quantitycart">
                                            <h6>@lang('lang.prodetails-quantity') :</h6>
                                            <div class="tm-quantitybox">
                                                <input type="text" value="1">
                                            </div>
                                            <a href="#" class="tm-button tm-button-dark">@lang('lang.addcart')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--// Product Details -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Product Quickview -->

    <button id="back-top-top"><i class="ion-arrow-up-c"></i></button>

    </div>
    <!--// Wrapper -->
@endsection
