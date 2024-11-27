@extends('layout.main')

@include('layout.header')

<!-- Breadcrumb Area -->
<div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ asset('images') }}/breadcrumb-bg.jpg">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2>Purchase history</h2>
            <ul>
                <li><a href="{{ url('home') }}">Home</a></li>
                <li>Purchase history</li>
            </ul>
        </div>
    </div>
</div>
<!--// Breadcrumb Area -->

<?php $promotion_name = 'null' ?>
<form action="{{ route('order.checkout', $promotion_name) }}" method="POST"
    id="promotion">
    @csrf
</form>

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
                            <th class="tm-cart-col-remove" scope="col">ID</th>
                            <th class="tm-cart-col-total" scope="col">Order status</th>
                            <th class="tm-cart-col-productname" scope="col">User name</th>
                            <th class="tm-cart-col-price" scope="col">Total</th>
                            <th class="tm-cart-col-image" scope="col">Date of payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="tm-cart-price">{{ $order->id }}</td>
                                @if ($order->order_status == 0)
                                    <td>
                                        <span class="tm-cart-totalprice">Chưa thanh toán</span>
                                        <button class="tm-cart-removeproduct" form="promotion">nhấn vào đây để thanh toán</button>
                                    </td>
                                @else
                                    <td>
                                        <span class="tm-cart-totalprice">Đã thanh toán</span>
                                        <a href="{{ route('purchase.detail', $order->id) }}" class="tm-cart-productimage">
                                            xem chi tiết
                                        </a>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{ url('user/' . $_SESSION['user_id']) }}" class="tm-cart-productname">{{ $user->name }}</a>
                                </td>
                                <td class="tm-cart-price">{{ number_format($order->order_total, 2, ',', '.') }} ₫</td>
                                <td class="tm-cart-price">{{ $order->order_date }}</td>
                            </tr>
                        @endforeach
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
