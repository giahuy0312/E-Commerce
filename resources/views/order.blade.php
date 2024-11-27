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

<?php $orderDetails = DB::table('order_product')->get(); ?>
@if (!isset($_SESSION))
    <?php session_start(); ?>
@endif


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
                            <th class="tm-cart-col-quantity" scope="col">@lang('lang.quantity')</th>
                            <th class="tm-cart-col-total" scope="col">@lang('lang.total')</th>
                            <th class="tm-cart-col-remove" scope="col">@lang('lang.remove')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $subtotal = 0;
                        $quality = 0;
                        $id_order = 0;
                        $promotion_amount = 0;
                        $promotion_name = "null";
                        ?>
                        @if (isset($_SESSION['order_id']))
                            <form action="{{ url('/order/' . $_SESSION['order_id']) }}" method="POST"
                                class="d-inline-block" id="update-cart" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @foreach ($orders as $order)
                                    @if ($order->user_id == $_SESSION['user_id'])
                                        @if ($order->order_status == 0)
                                            @foreach ($order->products as $product)
                                                <?php $price = $product->price; ?>
                                                <?php $id_order = $order->id; ?>
                                                @foreach ($orderDetails as $orderdetail)
                                                    @if ($orderdetail->product_id == $product->id && $orderdetail->order_id == $order->id)
                                                        <?php $quality = $orderdetail->quality; ?>
                                                        <?php $subtotal = $price * $quality; ?>
                                                        <?php $total += $subtotal; ?>
                                                    @endif
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('productDetails', $product->id) }}" class="tm-cart-productimage">
                                                            <img src="{{ asset('images/image-products') }}/{{ $product->image }}"
                                                                alt="{{ $product->image }}">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('productDetails', $product->id) }}"
                                                            class="tm-cart-productname">{{ $product->name }}</a>
                                                    </td>
                                                    <td class="tm-cart-price">
                                                        {{ number_format($product->price, 2, ',', '.') }}
                                                        ₫</td>
                                                    <td>
                                                        <div class="tm-quantitybox">
                                                            <input type="text" value="{{ $quality }}"
                                                                id="{{ $product->id }}"
                                                                name="id_{{ $product->id }}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="tm-cart-totalprice">{{ number_format($subtotal, 2, ',', '.') }}
                                                            ₫</span>
                                                    </td>
                                                    <td>
                                                        <a onclick="return confirm('Bạn có muốn xóa hay không?')"
                                                            href="{{ url('/order/' . $order->id . '/product/' . $product->id . '/token=' . csrf_token()) }}"
                                                            class="tm-cart-removeproduct"
                                                            style="padding: 0 30px; color: inherit;"><i
                                                                class="ion-close"></i></a>
                                                    </td>
                                                </tr>
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

            <!-- Shopping Cart Content -->
            <div class="tm-cart-bottomarea">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="tm-buttongroup">
                            <a href="#" class="tm-button">@lang('lang.conshop')</a>
                            <button type="submit" form="update-cart" class="tm-button">@lang('lang.updcart')</button>
                        </div>
                        <form action="{{ route('promotion.search') }}" class="tm-cart-coupon">
                            <label for="coupon-field">@lang('lang.havecoupon')</label>
                            <input type="text" id="coupon-field" placeholder="@lang('lang.entercoupon')" required="required"
                                maxlength="6" name="promotion" id="promotion">
                            <button type="submit" class="tm-button">@lang('lang.gui')</button>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="tm-cart-pricebox">
                            <h2>@lang('lang.carttotal')</h2>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr class="tm-cart-pricebox-subtotal">
                                            <td>@lang('lang.cartsubtotal')</td>
                                            <td>{{ number_format($total, 2, ',', '.') }} ₫</td>
                                        </tr>
                                        <tr class="tm-cart-pricebox-shipping">
                                            <td>(-) @lang('lang.promot')</td>
                                            @if ($promotion != null)
                                                <?php $promotion_name = $promotion[0]->name; ?>
                                                <td>{{ number_format($promotion[0]->amount, 2, ',', '.') }} ₫</td>
                                            @else
                                                <td>{{ $promotion_amount }} ₫</td>
                                            @endif
                                        </tr>
                                        <tr class="tm-cart-pricebox-total">
                                            <td>@lang('lang.total')</td>
                                            <td>{{ number_format($total - $promotion_amount, 2, ',', '.') }} ₫</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form action="{{ route('order.checkout', $promotion_name) }}" method="POST"
                                id="promotion">
                                @csrf
                            </form>
                            <button class="tm-button" form="promotion">@lang('lang.proccheck')</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Shopping Cart Content -->

        </div>
    </div>
    <!--// Shopping Cart Area -->

</main>
<!--// Page Content -->

@include('layout.footer')
