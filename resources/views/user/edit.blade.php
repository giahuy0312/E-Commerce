
<div class="mainEdit container ">
    <!-- Indexing -->
    <div class="row">
        <div class="col-9" style="padding-top: 50px;">
            <div class="title">
                <a href="{{ url('home')}}">@lang('lang.trangchu') </a> <span class="px-3 fs-3">@lang('lang.editUser')</span>
            </div>
        </div>
    </div>
            <!-- infoUser basic -->
        
            <div class="infoUser row pt-3">
                <div class="col">
                    <h3 style="padding-left:240px"><img src="{{ asset('images/user.png') }}" alt=""> {{ $user->name }}  </h3> 
                </div>
                <div class="col pt-4">
                   <h3>@lang('lang.cusId'): {{ $user->id }} </h3>
                </div>
            </div>
            <!-- form info detail -->
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="info-left col ">
                        <label for="name">@lang('lang.username')</label> <br>
                        <input type="text" name="name"  maxlength="20" required
                            style="background-image: url({{ asset('images/user.png') }}) ;background-size:30px 30px;"
                            class="border border-dark rounded-pill" value="{{ $user->username }}"> <br> <br>
                        <label for="username"> @lang('lang.name')</label> <br>
                        <input type="fullname" name="username"  maxlength="50" 
                            style="background-image: url({{ asset('images/user.png') }}) ;background-size:30px 30px;"
                            class="border border-dark rounded-pill" value="{{ $user->name }}"><br> <br>
                        <label for="phone">@lang('lang.phone')</label> <br>
                        <input type="tel" name="phone" pattern="0\d{9}" 
                            style="background-image: url({{ asset('images/phone.png') }});background-size:32px 45px;"
                            class="border border-dark rounded-pill" value="{{ $user->phone }}"> <br> <br>
                       
                    </div>

                    <div class="info-right col ">
                        <label for="DOB">@lang('lang.DOB')</label> <br>
                        <input type="date" name="DOB" style="background-image: url({{ asset('images/DOB.png') }}) ;background-size:30px 30px;"
                            class="border border-dark rounded-pill" value="{{ $user->DOB }}"> <br> <br>
                        <label for="gender">@lang('lang.gender')</label> <br>

                        <select name="gender" style="background-image: url({{ asset('images/gender.png') }});background-size:23px 25px;"
                             class="border border-dark rounded-pill">
                            <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                            <option value="Male">@lang('lang.male')</option>
                            <option value="Female">@lang('lang.female')</option>
                            <option value="Other">@lang('lang.other')</option>
                        </select>

                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                    <button type="submit" class="btn text-white">@lang('lang.save')</button>
                    <a href="{{ url('user/'. $_SESSION['user_id'])}}" class="btn btn-primary text-white"  style="width:100px;">@lang('lang.cancel')</a>
                      </div>
                </div>
            </form>

        </div>
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/style.css')}}">