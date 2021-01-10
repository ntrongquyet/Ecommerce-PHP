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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/28e407cbaa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <!--#region Datepicker libary -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!--#endregion -->

    <!-- nhan -->

    <title>@yield('title')</title>
</head>

<body class="position-relative">

    @section('sidebar')
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/">
            <img class="img-nav" src="https://upload.wikimedia.org/wikipedia/vi/archive/d/dc/20200125140746%21Vinfast-logo.png"
            alt="Girl in a jacket" width="50px" height="auto"></li>
        </a>
        <form class="form-inline my-2" action="/search" method="GET" role="form">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2" name="keyword" type="search"
            placeholder="Search" aria-label="Search">
            <button class="btn btn btn-light my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">
                  <span class="sr-only">(current)</span>
              </a>
            </li>
            @if (session()->has('user'))
                @if ($currentUser->role == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('/index-admin')}}">
                            <div class="nav-link-price">Admin Dashboard</div>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                <a href="/profile/{{session()->get('user')}}" class="nav-link">
                    <div class="nav-link-price">Tôi</div>
                </a>
                </li>
                <li class="nav-item">
                    <a href="/Logout" class="nav-link">
                        <div class="nav-link-price">Đăng xuất</div>
                    </a>
                </li>
              @else
              <li class="nav-item">
                <a href="/login" class="nav-link">
                    <div class="nav-link-price">Đăng nhập</div>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Register" class="nav-link">
                    <div class="nav-link-price">Đăng kí</div>
                </a>
              </li>
            @endif
            <li class="nav-item">
                <a href="/product/view/cart" type="button" class="nav-link">
                    <div class="nav-link-price">Giỏ hàng</div>
                </a>
            </li>
            <li class="nav-item">
                <a href="/product/view/cart" type="button" class="nav-link">
                     <div class="nav-link-price">Lịch sử mua hàng</div>
                </a>
            </li>
          </ul>
        </div>
      </nav>
    @show
    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- nhan -->
    <script src="{{ url('/js/likeProduct.js') }}"></script>
    <script src="{{ url('/JS/dist/carousel.js') }}"></script>
    <script src="{{ url('/js/scriptAdmin.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
    <footer>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-9">
                    <div class="row">
                        <div class="col-3">
                            <span><strong>Thông tin sinh viên</strong></span>
                            <p>1860011 - Nguyễn Trọng Quyết</p>
                            <p>1860014 - Ngô Tất Tố</p>
                            <p>1860038 - Phạm Phong Phú Cường</p>
                            <p>1860190 - Mai Thanh Nhân</p>
                        </div>
                        <div class="col-1">
                        </div>
                        <div class="col-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, perspiciatis. Ipsa, unde numquam fugiat id illo quisquam saepe blanditiis facere cum, quae odit necessitatibus atque quod veritatis nihil earum distinctio!
                        </div>
                        <div class="col-1">
                        </div>
                        <div class="col-1">
                        </div>
                        <div class="col-3">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero quisquam ex excepturi voluptatem veritatis voluptatibus. Iure cum dicta quas id harum accusamus dignissimos quaerat, animi omnis libero eveniet esse ducimus!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
