@extends('layout.main')

@include('layout.header')

<!-- Breadcrumb Area -->
<div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ asset('images') }}/breadcrumb-bg.jpg">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2>Reset Password</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>Reset Password</li>
            </ul>
        </div>
    </div>
</div>
<!--// Breadcrumb Area -->
<!-- Page Content -->
<main class="page-content">


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
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <!-- /form -->
                    <h2>New Password</h2>
                    <p>Vui lòng nhập mật khẩu mới</p>
                    <form action="{{ route('reset.passsword.post')}}" method="post">
                        @csrf
                        <input type="text" name="token" hidden value="{{$token}}">
                        <div class="tm-form-field">
                            <label for="login-password">Email</label>
                            <input type="email" name="email" required="required" value="{{old('email')}}">
                            @error('email')
                            <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="tm-form-field">
                            <label for="register-password">Password</label>
                            <input type="password" name="password" id="register-password" required="required" value="{{old('password')}}">
                            @error('password')
                            <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="tm-form-field">
                            <label for="register-password">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="confirm-password" required="required" value="{{old('password')}}">
                            @error('password_confirmation')
                            <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="tm-form-field">
                            <div>
                                <input type="checkbox" id="pass-show" name="pass-show">
                                <label for="pass-show">Show Password</label>
                            </div>
                        </div>
                        <button name="submit" class="tm-button" type="submit">Submit</button>
                    </form>
                    <div class="social-icons">
                        <p>Back to! <a href="{{route('login')}}" style="color: #f2ba59;">Login</a>.</p>
                    </div>
                    <!-- //form -->
                </div>
                <div class="col-lg-4 ">
                </div>
            </div>

        </div>





    </div>


</main>
<!--// Page Content -->

<script>
    const checkbox = document.getElementById('pass-show');
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