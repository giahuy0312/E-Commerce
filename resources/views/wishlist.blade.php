@extends('layout.main')

@include('layout.header')

<!-- Breadcrumb Area -->
<div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ asset('images') }}/breadcrumb-bg.jpg">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2>@lang('lang.giohang1')</h2>
            <ul>
                <li><a href="{{ url('home') }}">@lang('lang.trangchu')</a></li>
                <li><a href="products.html">@lang('lang.shop')</a></li>
                <li>@lang('lang.giohang1')</li>
            </ul>
        </div>
    </div>
</div>
<!--// Breadcrumb Area -->
<?php $wishlistDetails = DB::table('products')->get(); ?>

<!-- Page Content -->
<main class="page-content">

    <!-- Shopping Cart Area -->
    <div class="tm-section shopping-cart-area bg-white tm-padding-section">
        <div class="container">

            <!-- Shopping Cart Table -->
            <div class="tm-cart-table table-responsive">
                <table class="table table-bordered mb-0">
                    @if ($success = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $success }}
                    </div>
                    @endif
                    @if ($error = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                    @endif
                    <thead>
                        <tr>
                            <th class="tm-cart-col-image" scope="col">@lang('lang.image')</th>
                            <th class="tm-cart-col-productname" scope="col">@lang('lang.productname')</th>
                            <th class="tm-cart-col-price" scope="col">@lang('lang.price')</th>
                            <th class="tm-cart-col-total" scope="col">@lang('lang.addcart')</th>
                            <th class="tm-cart-col-remove" scope="col">@lang('lang.remove')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($_SESSION['user_id']))
                        <form action="" method="POST" class="d-inline-block" id="update-cart" enctype="multipart/form-data">
                            @csrf
                            @foreach ($wishlist as $item)
                            @if($item->count() > 0)
                            @if ($item->user_id == $_SESSION['user_id'])
                            @foreach ($wishlistDetails as $wishlistDetail)
                            @if ($wishlistDetail->id == $item->product_id)
                            <tr>
                                <td>
                                    <img src="{{ asset('images/image-products') }}/{{ $wishlistDetail->image }}">
                                </td>
                                <td>
                                    <a href="{{-- {{ route('products.show', $item->$product_id) }} --}}#" class="tm-cart-productname"></a>
                                    <p>{{ $wishlistDetail->name}}</p>
                                </td>
                                <td class="tm-cart-price">
                                    {{ number_format($wishlistDetail->price, 2, ',', '.') }}
                                    ₫
                                </td>
                                <td>
                                    <div class="tm-buttongroup">
                                        <button type="submit" form="" class="tm-button"> <a href="{{ route('order.add', [$_SESSION['order_id'], $wishlistDetail->id]) }}"><i class="ion-android-cart"></i> @lang('lang.addcart')</a></button>
                                    </div>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có muốn xóa hay không?')" href="{{ url('/addwishlist/product/' . $wishlistDetail->id . '/token=' . csrf_token()) }}" class="tm-cart-removeproduct" style="padding: 0 30px; color: inherit;"><i class="ion-close"></i></a>
                                </td>
                            </tr>

                            @endif
                            @endforeach

                            @endif
                            @endif
                            @endforeach

                        </form>
                        @endif
                    </tbody>
                </table>
            </div>
            <!--// Shopping Cart Table -->




        </div>
    </div>
    <!--// Shopping Cart Area -->

</main>
<!--// Page Content -->

@include('layout.footer')