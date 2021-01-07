@extends('layouts.default')
@section('title', 'Trang Administrator')

@section('sidebar')

    <body>
        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="sidebar-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="title">ADMIN <span>DASHBROAD</span></div>

                    <ul class="manipulation">
                        <li><a href="#"><i class="fas icon-nav fa-search"></i></a></li>
                        <li><a href="#"><i class="fas icon-nav fa-bell"></i></a></li>
                        <li><a href="#"><i class="fas icon-nav fa-power-off"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                        <img src="{{ url('/image/profile/male-profile-picture-vector-2041304.jpg') }}" alt="">
                        <p>Phú Cường</p>
                    </center>
                    <li class="item">
                        <a href="{{ URL::to('/index-admin') }}" class="menu-btn">
                            <i class="fas fa-desktop"></i><span>Trang chủ</span>
                        </a>
                    </li>
                    <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-user-circle"></i><span>Khách hàng<i
                                    class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="{{ URL::to('/view-customer') }}"><i class="fas fa-image"></i><span>Thông tin khách
                                    hàng</span></a>
                            <a href="{{ URL::to('/add-customer') }}"><i class="fas fa-address-card"></i><span>Thêm khách
                                    hàng</span></a>
                        </div>
                    </li>
                    <li class="item" id="messages">
                        <a href="#messages" class="menu-btn">
                            <i class="fas fa-envelope"></i><span>Sản phẩm <i
                                    class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="{{ URL::to('/view-product') }}"><i class="fas fa-envelope"></i><span>Xem sản
                                    phẩm</span></a>
                            <a href="{{ URL::to('/top-product') }}"><i class="fas fa-envelope-square"></i><span>10 sản phẩm
                                    bán chạy</span></a>
                        </div>
                    </li>
                    <li class="item" id="settings">
                        <a href="#settings" class="menu-btn">
                            <i class="fas fa-cog"></i><span>Đơn hàng<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="{{ URL::to('/view-purchase') }}"><i class="fas fa-lock"></i><span>Xem các đơn
                                    hàng</span></a>
                            <a href="{{ URL::to('/filter-purchase') }}"><i class="fas fa-language"></i><span>Lộc đơn
                                    hàng</span></a>
                        </div>
                    </li>
                    <li class="item" id="statistic">
                        <a href="#statistic" class="menu-btn">
                            <i class="fas fa-info-circle"></i><span>Thống kê<i
                                    class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="{{ URL::to('/revenue-statistic') }}"><i class="fas fa-lock"></i><span>Doanh
                                    thu</span></a>
                            {{-- <a href="{{ URL::to('/revenue-month') }}"><i
                                    class="fas fa-lock"></i><span>Doanh thu theo tháng</span></a>
                            <a href="{{ URL::to('/revenue-quarter') }}"><i class="fas fa-language"></i><span>Doanh thu theo
                                    quý</span></a>
                            <a href="{{ URL::to('/revenue-year') }}"><i class="fas fa-language"></i><span>Doanh thu theo
                                    năm</span></a> --}}
                        </div>
                    </li>
                </div>
            </div>

            {{--
            <!--main container start--> --}}
            <section class="main-container">
                @yield('admin-content')
            </section>

            {{--
            <!--main container end--> --}}
        </div>
        <!--wrapper end-->

        {{-- <script type="text/javascript">
            $(document).ready(function() {
                $(".sidebar-btn").click(function() {
                    $(".wrapper").toggleClass("collapse");
                });
            });

        </script> --}}

    </body>
@endsection

@section('content')
