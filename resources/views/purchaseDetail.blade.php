@extends('layout.main')

@include('layout.header')

<!-- Breadcrumb Area -->
<div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ asset('images') }}/breadcrumb-bg.jpg">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2>Purchase Detail</h2>
            <ul>
                <li><a href="{{ url('home') }}">Home</a></li>
                <li><a href="{{ url('purchase') }}">Purchase history</a></li>
                <li>Purchase detail</li>
            </ul>
        </div>
    </div>
</div>
<!--// Breadcrumb Area -->

<?php $orderDetails = DB::table('order_product')
    ->where(['order_id' => $order_id])
    ->get(); ?>

<!-- Page Content -->
<main class="page-content">

    <!-- Shopping Cart Area -->
    <div class="tm-section shopping-cart-area bg-white tm-padding-section">
        <div class="container">

            <!-- Shopping Cart Table -->
            <div class="tm-cart-table table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class="tm-cart-col-image" scope="col">Image</th>
                            <th class="tm-cart-col-productname" scope="col">Product</th>
                            <th class="tm-cart-col-price" scope="col">Price</th>
                            <th class="tm-cart-col-quantity" scope="col">Quantity</th>
                            <th class="tm-cart-col-total" scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($products as $product)
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
                                    <span class="tm-cart-totalprice">{{ $orderDetails[$i]->quality }}</span>
                                    <?php
                                    $total = 0;
                                    $total += $orderDetails[$i]->quality * $product->price;
                                    $i++;
                                    ?>
                                </td>
                                <td>
                                    <span class="tm-cart-totalprice">{{ number_format($total, 2, ',', '.') }}
                                        ₫</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!--// Shopping Cart Table -->

            <div class="tm-cart-bottomarea">
                <a href="{{ url('purchase') }}" class="tm-button">Back to purchase</a>
            </div>

        </div>
    </div>
    <!--// Shopping Cart Area -->

</main>
<!--// Page Content -->

@include('layout.footer')
