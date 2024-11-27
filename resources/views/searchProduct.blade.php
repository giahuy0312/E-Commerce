@extends('layout.main')

@section('content')

<!-- Wrapper -->
<div id="wrapper" class="wrapper">

    <!-- Header -->
    @include('layout.header')
    <!--// Header -->
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ asset('images') }}/banner1.png" style="width:1260px;height:400px;">
        <div class="container">
            <div class="tm-breadcrumb" style="margin-top: 100px;">
                <h2>Products</h2>
                <ul>
                    <li><a href="{{ url('/home') }}">Trang chủ</a></li>
                    <li> <a href="{{ url('/shop') }}">Nhẫn cưới</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->


    <!-- Page Content -->
    <main class="page-content">

        <!-- Products Wrapper -->
        <div class="tm-products-area tm-section tm-padding-section bg-white">
            <div class="container">
                <form action="#" class="tm-shop-header" >
                    <div class="tm-shop-productview">
                        <span>View:</span>
                        <button data-view="grid" class="active"><i class="ion-android-apps"></i></button>
                        <button data-view="list"><i class="ion-android-menu"></i></button>
                    </div>
                    <p class="tm-shop-countview">Showing 1 to 9 of 16 </p>
                    <select name="sortProduct" id="sortProduct" >
                        <option value="value">Name A-Z</option>
                        <option value="value">Name Z-A</option>
                        
                    </select>
                </form>

                <div class="tm-shop-products">
                    <div class="row mt-30-reverse">
                        <!-- Single Product -->
                        @if (isset($products))
                        @if($products[0] == [])
                        <div class="test" style = "color:red;">
                            <p>Tên sản phẩm không tồn tại vui lòng nhập lại từ khóa tìm kiếm</p>
                        </div>
                        @endif
                        @foreach ($products as $product)
                        	
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
                            <div class="tm-product tm-scrollanim">
                                <div class="tm-product-topside">
                                    <div class="tm-product-images">
                                        <img src="{{ asset('images/image-products') }}/{{ $product->image }}" alt="product image">
                                        <img src="{{ asset('images/image-products') }}/{{ $product->image }}" alt="product image">
                                    </div>
                                    <ul class="tm-product-actions">
                                        <li><a href="#"><i class="ion-android-cart"></i> Add to cart</a>
                                        </li>
                                        <li><button data-fancybox data-src="#tm-product-quickview"><i
                                                    class="ion-eye"></i></button></li>
                                        <li><a href="#"><i class="ion-heart"></i></a></li>
                                    </ul>
                                    <div class="tm-product-badges">
                                        <span class="tm-product-badges-new">New</span>
                                        <span class="tm-product-badges-sale">Sale</span>
                                    </div>
                                </div>
                                <div class="tm-product-bottomside">
                                    <h6 class="tm-product-title"><a href="{{route('productDetails', $product->id)}}">{{ $product->name }}</a></h6>
                                    <div class="tm-ratingbox">
                                        <span class="is-active"><i class="ion-android-star-outline"></i></span>
                                        <span class="is-active"><i class="ion-android-star-outline"></i></span>
                                        <span class="is-active"><i class="ion-android-star-outline"></i></span>
                                        <span class="is-active"><i class="ion-android-star-outline"></i></span>
                                        <span><i class="ion-android-star-outline"></i></span>
                                    </div>
                                    <span class="tm-product-price">{{ $product->price }}</span>
                                    <div class="tm-product-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry.
                                            Lorem
                                            Ipsum has been the industry's standard dummy text ever since the
                                            when an unknown printer took a galley of type and scrambled it
                                            to make a
                                            type specimen book. It has survived not only five centuries, but
                                            also the
                                            leap into electronic typesetting.</p>
                                        <ul class="tm-product-actions">
                                            <li><a href="#"><i class="ion-android-cart"></i> Add to cart</a>
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
                </div>

            </div>
        </div>
        <!--// Products Wrapper -->

    </main>
    <!--// Page Content -->

    <!-- Footer -->
    @include('layout.footer')
    <!--// Footer -->



    <button id="back-top-top"><i class="ion-arrow-up-c"></i></button>

</div>
<!--// Wrapper -->

@endsection