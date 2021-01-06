<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('/style/carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/style/detailProductStyle.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/style/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/style/adminStyle.css') }}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/28e407cbaa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <!-- nhan -->

    <title>@yield('title')</title>
</head>

<body>

    @section('sidebar')
<div class="col-12-nav">
<div class="col-9">
<nav class="navbar navbar-expand-md navbar-dark bg-danger">
        <div>
            <a class="navbar-brand" href="/">
                <img class="img-nav"
                    src="https://upload.wikimedia.org/wikipedia/vi/archive/d/dc/20200125140746%21Vinfast-logo.png"
                    alt="Girl in a jacket" width="50px" height="auto"></li>
            </a>
        </div>
        <div class="form-search-nav">
            <form class="form-inline my-2 my-lg-0" action="/search" method="GET" role="form">
                {{ csrf_field() }}
                <input class="form-control mr-sm-2" name="keyword" type="text" style="min-width: 25em;"
                    placeholder="Tìm kiếm sản phẩm">
                <button class="btn btn-outline-none my-2 my-sm-0"
                 style="margin-left: -15px; background: #b2b2b2;  border: solid 1px #b2b2b2; "
                 type="submit">Tìm kiếm</button>
            </form>
        </div>
        <div class="collapse navbar-collapse nav-login-register login-register-icon" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                </li>
                @if (session()->has('user'))
                <li class="nav-item-account" style="margin-right: 10px ;">
                    <img src="{{url('/image/icon/CHl3pf0.png')}}" width="30px" height="auto" alt="user">
                    <a class="nav-link" style="float:right;" href="/profile/{{session()->get('user')}}">Tôi</a>
                </li>   
                <li class="nav-item-account">
                    <img src="{{url('/image/icon/logout.png')}}" width="30px" height="auto" alt="user">
                    <a class="nav-link" style="float:right;" href="/Logout">Đăng xuất</a>
                </li>
                @else
                <li class="nav-item-account" style="margin-right: 10px ;">
                    <img src="{{url('/image/icon/CHl3pf0.png')}}" width="30px" height="auto" alt="user">
                    <a class="nav-link" style="float:right;" href="/login">Đăng nhập</a>
                </li>
                <li class="nav-item-account">
                    <img src="{{url('/image/icon/bD1K2MI.png')}}" width="30px" height="auto" alt="user">
                    <a class="nav-link" style="float:right;" href="/Register">Đăng kí</a>
                </li>
                @endif
            </ul>
        </div>
        <a href="/product/view/cart" type="button" class="btn btn-danger">
            <img src="{{url('/image/icon/xpO3mPl.png')}}" width="30px" height="auto" alt="user">
            <div class="nav-link" style="float: right;">Giỏ hàng</div>
        </a>
        <a href="/product/view/cart" type="button" class="btn btn-danger">
            <img class="img-invoice" src="{{url('/image/icon/invoice.png')}}" width="30px" height="auto" alt="user">
            <div class="nav-link" style="float: right;">Thông tin đơn hàng</div>
        </a>
    </nav>
</div>
</div>
    @show

    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- nhan -->
    <script src="{{ url('/js/likeProduct.js') }}"></script>
    <script src="{{ url('/js/carousel.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
</body>

</html>
