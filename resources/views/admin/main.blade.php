<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/admin/style-admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/style-admin-index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
        href="/css/app-wa-02670e9412103b5852dcbe140d278c49.css?vsn=d">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">

</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="option col-md-12">
                    <p>
                    <div>
                        <a id="toggler" class="visible-xs" href="#toggle">
                            <img src="{{asset('images/admin/LogoAdmin.png')}}" alt="">
                        </a>
                    </div>
                    <div class="logo"><a href="/">Luxury Administrator</a></div>
                    <div class="headerAdmin">
                        <li style="">Chào mừng: <strong style="  box-sizing: border-box;
                            padding: 20px;
                            border-right: 1px solid black;">admin</strong></li>
                        <li><a href=""><span>Thay đổi mật khẩu</span></a></li>
                        <li><a href="{{ route('signout') }}"><i
                                    class="fa-sharp fa-regular fa-arrow-right-from-bracket fa-2xl pe-2"
                                    style="color:red"></i><span>Thoát</span></a></li>
                    </div>
                    </p>

                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div id="menu">
                    <ul id="sidebar">
                        <li> <a href=""> <span> Thống kê </span> </a> </li>
                        <li> <a href="{{route('listvoucher')}}"> <span> Mã giảm giá </span> </a> </li>
                        <li> <a href=""> <span> Lịch sử hàng hóa </span> </a> </li>
                        <li> <a href="{{route('listproduct')}}"> <span> Sản phẩm </span> </a> </li>
                        <li> <a href="{{route('listUser')}}"> <span> Khách hàng </span> </a> </li>
                        <li> <a href="{{route('listcategory')}}"> <span> Danh mục sản phẩm </span> </a> </li>
                    </ul>

                </div>
            </div>
            <div class="col-md-9">
                <div id="body">
                    <div id="content-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
</body>

</html>