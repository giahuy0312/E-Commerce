@extends('layout.main')

@include('layout.header')

<!-- Breadcrumb Area -->
<div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ asset('images') }}/breadcrumb-bg.jpg">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2>Login</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>Login</li>
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
                <div class="col-lg-4 ">
                </div>
                <div class="col-lg-4 ">
                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <form action="{{ route('login')}}" class="tm-form tm-login-form" method="POST">
                        @csrf
                        <h4>Login</h4>
                        <p>Become a part of our community!</p>
                        <div class="tm-form-inner">
                            <div class="tm-form-field">
                                <label for="login-email">Email address</label>
                                <input type="email" name="email" id="login-email" value="{{old('email')}}">
                                @error('email')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="tm-form-field">
                                <label for="login-password">Password</label>
                                <input type="password" name="password" id="login-password" value="{{old('password')}}">
                                @error('password')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="tm-form-field">
                                <div>
                                    <input type="checkbox" id="pass-show" name="pass-show">
                                    <label for="pass-show">Show Password</label>
                                </div>
                            </div>
                            <div class="tm-form-field">
                                <input type="checkbox" name="login-remember" id="login-remember">
                                <label for="login-remember">Remember Me</label>
                                <p class="mb-0"><a href="{{route('forget.password')}}">Forgot your password?</a></p>
                            </div>

                            <div class="tm-form-field">
                                <button type="submit" class="tm-button">Login</button>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-lg-4 ">
                </div>
            </div>

        </div>





    </div>
    <!--// Login Register Area -->

</main>
<!--// Page Content -->
<script>
    const checkbox = document.getElementById('pass-show');
    const passwordInput = document.getElementById('login-password');
    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';

        }
    });
    const rememberMe = document.getElementById('login-remember');

    if (rememberMe.checked) {
        // Lưu thông tin đăng nhập của người dùng vào cookie
        setCookie('email', document.getElementById('login-email').value, time() + 60 * 60 * 24 * 30);
        setCookie('password', document.getElementById('login-password').value, time() + 60 * 60 * 24 * 30);
    }
</script>

@include('layout.footer')