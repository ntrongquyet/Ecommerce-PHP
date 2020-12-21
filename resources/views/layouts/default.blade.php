<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('/style/main.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-5.12.1-web/fontawesome-free-5.12.1-web/css/all.min.css">
    <title>@yield('title')</title>
</head>

<body>

    @section('sidebar')
    <nav class="navbar navbar-expand-md navbar-dark bg-danger">
    <div>
      <a class="navbar-brand" href="/">
        <img class="img-nav" src="https://upload.wikimedia.org/wikipedia/vi/archive/d/dc/20200125140746%21Vinfast-logo.png" alt="Girl in a jacket" width="75px" height="auto"></li>
      </a>
    </div>
    <div>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" style="min-width: 30em;" placeholder="Tìm kiếm sản phẩm">
        <button class="btn btn-outline-none my-2 my-sm-0" style="margin-left: -15px;" type="submit">Tìm kiếm</button>
      </form>
    </div>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
        </li>
        @if (session()->has('user'))
        <li class="nav-item-account" style="margin-right: 10px ;">
          <img src="{{url('/image/icon/CHl3pf0.png')}}" width="30px" height="auto" alt="user">
          <a class="nav-link" style="float:right;" href="/{{session()->get('user')}}">Tôi</a>
        </li>
        <li class="nav-item-account">
          <img src="{{url('/image/icon/bD1K2MI.png')}}" width="30px" height="auto" alt="user">
          <a class="nav-link" style="float:right;" href="/Logout">Đăng xuất</a>
        </li>
        @else
        <li class="nav-item-account" style="margin-right: 10px ;">
          <img src="{{url('/image/icon/CHl3pf0.png')}}" width="30px" height="auto" alt="user">
          <a class="nav-link" style="float:right;" href="login">Đăng nhập</a>
        </li>
        <li class="nav-item-account">
          <img src="{{url('/image/icon/bD1K2MI.png')}}" width="30px" height="auto" alt="user">
          <a class="nav-link" style="float:right;" href="Register">Đăng kí</a>
        </li>
        @endif
      </ul>
    </div>
    <button type="button" class="btn btn-danger">
      <img src="{{url('/image/icon/xpO3mPl.png')}}" width="30px" height="auto" alt="user">
      <div class="nav-link" style="float: right;">Giỏ hàng</div>
    </button>
  </nav>
    @show

    <div class="container mt-2">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
