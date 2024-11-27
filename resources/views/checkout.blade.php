@extends('layout.main')

@include('layout.header')

<!-- Breadcrumb Area -->
<div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ asset('images/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2>@lang('lang.checkout')</h2>
            <ul>
                <li><a href="{{ url('home') }}">@lang('lang.trangchu')</a></li>
                <li><a href="products.html">@lang('lang.shop')</a></li>
                <li>@lang('lang.checkout')</li>
            </ul>
        </div>
    </div>
</div>
<!--// Breadcrumb Area -->

<!-- Page Content -->
<main class="page-content">

    <!-- Checkout Area -->
    <div class="tm-section tm-checkout-area bg-white tm-padding-section">
        <div class="container">
            <form action="{{ route('order.payment') }}" class="tm-form tm-checkout-form needs-validation" method="GET"
                novalidate>
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="small-title">@lang('lang.billinfo')</h4>

                        <!-- Billing Form -->
                        <div class="tm-checkout-billingform">
                            <div class="tm-form-inner">
                                <div class="tm-form-field">
                                    <label for="billingform-usernamename">@lang('lang.user-name')</label>
                                    <input class="form-control" type="text" id="billingform-username"
                                        value="{{ $user->username }}" maxlength="50" name="username" required>
                                    <div class="invalid-feedback">
                                        @lang('lang.enterusername')
                                    </div>
                                </div>
                                <div class="tm-form-field">
                                    <label for="billingform-companyname">@lang('lang.username')</label>
                                    <input class="form-control" type="text" id="billingform-companyname"
                                        value="{{ $user->name }}" maxlength="50" name="name">
                                </div>
                                <div class="tm-form-field">
                                    <label for="billingform-email">@lang('lang.emailaddress')</label>
                                    <input class="form-control" type="email" id="billingform-email"
                                        value="{{ $user->email }}" name="email" readonly>
                                </div>
                                <div class="tm-form-field">
                                    <label for="billingform-phone">@lang('lang.phone') (Optional)</label>
                                    <input class="form-control" maxlength="10" type="text" id="billingform-phone"
                                        value="{{ $user->phone }}" name="phone">
                                    <div class="invalid-feedback">
                                        @lang('lang.enterphone')
                                    </div>
                                </div>
                                <div class="tm-form-field">
                                    <label for="billingform-address">@lang('lang.diachi')</label>
                                    <input class="form-control" type="text" id="billingform-address"
                                        placeholder="@lang('lang.plhenteraddr')" value="{{ $user->address }}" maxlength="100" name="address"
                                        required>
                                    <div class="invalid-feedback">
                                        @lang('lang.enteraddress')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--// Billing Form -->
                    </div>
                    <div class="col-lg-6">
                        <div class="tm-checkout-orderinfo">
                            <div class="table-responsive">
                                <table class="table table-borderless tm-checkout-ordertable">
                                    <thead>
                                        <tr>
                                            <th>@lang('lang.product')</th>
                                            <th>@lang('lang.total')</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $subtotal = 0;
                                    $total = 0;
                                    ?>
                                    <tbody>
                                        @foreach ($products as $product)
                                            @foreach ($orderDetails as $orderDetail)
                                                @if ($orderDetail->product_id == $product->id)
                                                    <?php $price = $orderDetail->quality * $product->price; ?>
                                                    <tr>
                                                        <td>{{ $product->name }} * {{ $orderDetail->quality }}</td>
                                                        <td>{{ number_format($price, 2, ',', '.') }} ₫</td>
                                                    </tr>
                                                    <?php $subtotal += $price; ?>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="tm-checkout-subtotal">
                                            <td>@lang('lang.cartsubtotal')</td>
                                            <td>{{ number_format($subtotal, 2, ',', '.') }} ₫</td>
                                        </tr>
                                        <tr class="tm-checkout-shipping">
                                            <td>(-)  @lang('lang.promot')</td>
                                            @if ($promotion == 'null')
                                                <?php $promotion = 0; ?>
                                            @else
                                                <?php $promotion = $promotion[0]->amount; ?>
                                            @endif
                                            <td>{{ $promotion }} ₫</td>
                                        </tr>
                                        <tr class="tm-checkout-total">
                                            <td>@lang('lang.total')</td>
                                            <?php $total = $subtotal - $promotion; ?>
                                            <td>{{ number_format($total, 2, ',', '.') }} ₫</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="tm-checkout-submit">
                                <p>@lang('lang.checkout-submit-title')</p>
                                <div class="tm-form-inner">
                                    <div class="tm-form-field">
                                        <input class="form-check-input" type="checkbox" name="checkout_read_terms"
                                            id="checkout_read_terms" required>
                                        <label class="form-check-label" for="checkout_read_terms">@lang('lang.checkout-read-terms')</label>
                                        <div class="invalid-feedback">
                                            @lang('lang.checkout-invalid')
                                        </div>
                                    </div>
                                    <div class="tm-form-field">
                                        <button type="submit" class="tm-button ml-auto" id="place_order">@lang('lang.placeOrder')</button>
                                    </div>
                                    <script>
                                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                                        (function() {
                                            'use strict'

                                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                            var forms = document.querySelectorAll('.needs-validation')

                                            // Loop over them and prevent submission
                                            Array.prototype.slice.call(forms)
                                                .forEach(function(form) {
                                                    form.addEventListener('submit', function(event) {
                                                        if (!form.checkValidity()) {
                                                            event.preventDefault()
                                                            event.stopPropagation()
                                                        }

                                                        form.classList.add('was-validated')
                                                    }, false)
                                                })
                                        })()
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--// Checkout Area -->

</main>
<!--// Page Content -->

@include('layout.footer')
