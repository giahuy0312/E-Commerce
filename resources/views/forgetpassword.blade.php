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
                    <!-- /form -->
                    <h2>Forgot Password</h2>

                    <form action="{{ route('forget.password.post')}}" method="post">
                        @csrf
                        <div class="tm-form-field">
                            <label for="login-password">Email</label>
                            <input type="email" name="email" placeholder="Enter Your Email" required="required" value="{{old('email')}}">
                            @error('email')
                            <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <button name="submit" class="tm-button" type="submit">Send Reset Link</button>
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
    $(document).ready(function(c) {
        $('.alert-close').on('click', function(c) {
            $('.main-mockup').fadeOut('slow', function(c) {
                $('.main-mockup').remove();
            });
        });
    });
</script>

</body>

</html>
@include('layout.footer')