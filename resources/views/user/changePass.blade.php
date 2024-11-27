@extends('layout.main')

@section('content')

@include('layout.header')
<div class="mainUser">
    <div class="container">
        <div class="row">
            <!-- Logo -->
            <div class="col-3">
                <div class="titleLogo"><a href="{{ url('index')}}">
                <img src="{{ asset('images/logo.png') }}" alt="" style="width: 150px; height: 170px;">
                    </a>
                </div>
                <!-- Menu User -->
                <div class="menuUser">
                    <p><br></p>
                    <p><a href="{{ url('user/'. $_SESSION['user_id'])}}"> @lang('lang.accinfo') </a></p>
                    <p><a href="{{ url('changepass/'. $_SESSION['user_id'])}}">  @lang('lang.changepass')</a></p>
                    <p><a href="">@lang('lang.discode') </a></p>
                    <p><a href=""> @lang('lang.purhis')  </a></p>
                    <p> <img src="{{ asset('images/logout.png') }}" alt=""><a href="{{ route('logout') }}" style="color:red">@lang('lang.dangxuat') </a></p>
                </div>
            </div>
            <!-- Indexing -->
            <div class="col-9" style="padding-top: 50px;">
                <div class="title mb-3"><a href="{{ url('home')}}"> @lang('lang.trangchu')  </a> <span class="px-3 fs-3"> <span class="p-2">></span> @lang('lang.changepass') </span></div>
          
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
        
                    <form action="{{route('user.updatePass',$user->id)}}" method="post">
                        @csrf
                    <div class="mb-3">
                        <label for="oldPass" class="form-label">@lang('lang.oldpass')</label>
                        <input type="password" class="form-control" id="oldPass" name="oldPass">
                        @if($errors->any('oldPass'))
                        <span class="text-danger">{{$errors->first('oldPass')}}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="newPass" class="form-label">@lang('lang.newpass')</label>
                        <input type="password" class="form-control" id="newPass" name="newPass">
                        @if($errors->any('newPass'))
                        <span class="text-danger">{{$errors->first('newPass')}}</span>
                        @endif
                    </div>
                    <div class="mb-3ck">
                    <label class="form-label" for="comfirmPass">@lang('lang.comfirmpass')</label>
                        <input type="password" class="form-control" id="comfirmPass" name="comfirmPass"> <br>
                        @if($errors->any('comfirmPass'))
                        <span class="text-danger">{{$errors->first('comfirmPass')}}</span>
                        @endif
                    </div>
                    <div class="tm-form-field">
                        <div>
                            <input type="checkbox" id="changepass-show" name="changepass-show">
                            <label for="changepass-show">@lang('lang.showPass')</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('lang.submit')</button>
                    </form>
  
                </div>
            </div>

        </div>
    </div>
</div>
{{-- show pass --}}
<script>
    const checkbox = document.getElementById('changepass-show');
    const passwordInputold = document.getElementById('oldPass');
    const passwordInputnew = document.getElementById('newPass');
    const passwordInputcomf = document.getElementById('comfirmPass');
    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            passwordInputnew.type = 'text';
            passwordInputold.type = 'text';
            passwordInputcomf.type = 'text';
        } else {
            passwordInputnew.type = 'password';
            passwordInputold.type = 'password';
            passwordInputcomf.type = 'password';
        }
    });
</script>
@endsection


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
    href="/css/app-wa-02670e9412103b5852dcbe140d278c49.css?vsn=d">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">



