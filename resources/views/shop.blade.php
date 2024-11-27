@extends('layout.main')

@section('content')
<!-- Wrapper -->
<div id="wrapper" class="wrapper">

    @include('layout.header')


    <!-- Page Content -->
    <main class="page-content">

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
                    @foreach($products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
                        <div class="tm-product tm-scrollanim">
                            <div class="tm-product-topside">
                                <div class="tm-product-images">
                                    <img src="{{ asset('images/image-products0') }}/{{$product->image}}" alt="product image">
                                    <img src="{{ asset('images/image-products0') }}/{{$product->image}}" alt="product image">
                                </div>
                                <ul class="tm-product-actions">
                                    <li><a href="#"><i class="ion-android-cart"></i>@lang('lang.addcart')</a></li>
                                    <li><button data-fancybox data-src="#tm-product-quickview"><i
                                                class="ion-eye"></i></button></li>
                                    <li><a href="#"><i class="ion-heart"></i></a></li>
                                </ul>
                                <div class="tm-product-badges">
                                    <span class="tm-product-badges-new">@lang('lang.moi')</span>
                                </div>
                            </div>
                            <div class="tm-product-bottomside">
                                <h6 class="tm-product-title"><a href="{{route('productDetails', $product->id)}}">{{$product->name}}</a></h6>
                                <span class="tm-product-price">{{$product->price}}</span>
                                <div class="tm-product-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem
                                        Ipsum has been the industry's standard dummy text ever since the
                                        when an unknown printer took a galley of type and scrambled it to make a
                                        type specimen book. It has survived not only five centuries, but also the
                                        leap into electronic typesetting.</p>
                                    <ul class="tm-product-actions">
                                        <li><a href="#"><i class="ion-android-cart"></i>@lang('lang.addcart')</a></li>
                                        <li><button data-fancybox data-src="#tm-product-quickview"><i
                                                    class="ion-eye"></i></button></li>
                                        <li><a href="#"><i class="ion-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--// Single Product -->
                </div>
                <!-- <div class="tm-product-loadmore text-center mt-50">
                    <a href="products.html" class="tm-button">All Products</a>
                </div> -->
            </div>
        </div>
        <!--// Popular Products Area -->

        

       

        <!-- Brand Logos -->
       
        <!--// Brand Logos -->

    </main>
    <!--// Page Content -->
   
   
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
                                                <b>@lang('lang.prodetails-id')  </b>010
                                            </div>
                                            <div class="tm-prodetails-singleinfo">
                                                <b>@lang('lang.prodetails-cate')  </b><a href="#">@lang('lang.prodetails-cate-name')</a>
                                            </div>
                                            <div class="tm-prodetails-singleinfo tm-prodetails-tags">
                                                <b>Tags : </b>
                                                <ul>
                                                    <li><a href="#">@lang('lang.prodetails-tags1')</a></li>
                                                    <li><a href="#">@lang('lang.prodetails-tags2')</a></li>
                                                    <li><a href="#">@lang('lang.prodetails-tags3')</a></li>
                                                    <li><a href="#">@lang('lang.prodetails-tags4')</a></li>
                                                </ul>
                                            </div>
                                            <div class="tm-prodetails-singleinfo">
                                                <b>@lang('lang.prodetails-avail') : </b>
                                                <span class="color-theme"> @lang('lang.prodetails-avail1')</span>
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
    {{$products->links()}}

    @include('layout.footer')
    <!--// Product Quickview -->

    <button id="back-top-top"><i class="ion-arrow-up-c"></i></button>
    
</div>
<!--// Wrapper -->
@endsection