@extends('layout.main')

@include('layout.header')

<!-- Breadcrumb Area -->
<div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ asset('images') }}/breadcrumb-bg.jpg">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2>Register</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>Register</li>
            </ul>
        </div>
    </div>
</div>
<!--// Breadcrumb Area -->


<!-- Page Content -->
<main class="page-content">

    <!-- Login Register Area -->
    <div class="tm-section tm-login-register-area bg-white tm-padding-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                    @endif
                    <form action="{{ route('registerpost')}}" class="tm-form tm-register-form" method="POST">
                        @csrf
                        <h4>Create an account</h4>
                        <p>Welcome! Register for an account</p>
                        <div class="tm-form-inner">
                            <div class="tm-form-field">
                                <label for="register-username">Username</label>
                                <input type="text" name="name" id="register-username" value="{{old('name')}}">
                                @error('name')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="tm-form-field">
                                <label for="register-email">Email address</label>
                                <input type="email" name="email" id="register-email" value="{{old('email')}}">
                                @error('email')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="tm-form-field">
                                <label for="register-password">Password</label>
                                <input type="password" name="password" id="register-password"
                                    value="{{old('password')}}">
                                @error('password')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="tm-form-field">
                                <label for="register-password">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="confirm-password"
                                    value="{{old('password')}}">
                                @error('password_confirmation')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="tm-form-field">
                                <div>
                                    <input type="checkbox" id="register-pass-show" name="register-pass-show">
                                    <label for="register-pass-show">Show Password</label>
                                </div>
                            </div>
                            <div class="tm-form-field">
                                <button type="submit" class="tm-button">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                </div>
            </div>






        </div>


    </div>
    <!--// Login Register Area -->

</main>
<!--// Page Content -->
<script>
const checkbox = document.getElementById('register-pass-show');
const passwordInput = document.getElementById('register-password');
const confirmpasswordInput = document.getElementById('confirm-password');

checkbox.addEventListener('change', () => {
    if (checkbox.checked) {
        passwordInput.type = 'text';
        confirmpasswordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
        confirmpasswordInput.type = 'password';
    }
});
</script>

@include('layout.footer')