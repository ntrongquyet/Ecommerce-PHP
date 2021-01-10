@extends('Admin.AdminPage')
@section('admin-content')

    <style>
        .small-box{
            border-radius: 5px !important;
        }
        .small-box .inner {
            padding: 10px;
        }
        .small-box-footer{
            background-color: rgba(0,0,0,.1);
            color: rgba(255,255,255,.8);
            display: block;
            padding: 3px 0;
            position: relative;
            text-align: center;
            text-decoration: none;
            z-index: 10;
        }
        .fa-arrow-circle-right{
            margin-left: 5px;
        }
        .admin-icon{
            font-size: 40;
            position: absolute;
            right: 27px;
            top: 46px;
            color: rgba(0,0,0,.15);
        }
        .inner p{
            z-index: 100;
        }
    </style>
    <div class="user-control">
        {{-- <h1 class="my-font">welcom to admin page</h1> --}}
        <div class="my-form">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box my-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>Đơn hàng</p>
                        </div>
                        <div class="admin-icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box my-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Lượt thích</p>
                        </div>
                        <div class="admin-icon">
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box my-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>Số lượng người dùng</p>
                        </div>
                        <div class="admin-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box my-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Số lượng sản phẩm</p>
                        </div>
                        <div class="admin-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </div>

@endsection
