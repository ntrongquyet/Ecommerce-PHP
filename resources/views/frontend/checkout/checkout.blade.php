@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
<!-- <div class="col-sm-8">
    <div class="bill-to">
        <p>Thông tin khách hàng</p>
        <div class="form-one" style="width: 100%;">
            <form action="/product/cart/checkout" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    <ul>
                        <li>{{$err}}</br></li>
                    </ul>

                    @endforeach
                </div>
                @endif
                @if(Session::has('thanhcong'))
                <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                @endif
                @if(Session::has('thatbai'))
                <div class="alert alert-danger">{{Session::get('thatbai')}}</div>
                @endif
                <input type="text" name="hoten" placeholder="Tên người nhận">
                <input type="text" name="email" placeholder="Email*">
                <input type="text" name="diachi" placeholder="Địa chỉ">
                <input type="text" name="sodienthoai" placeholder="Số điện thoại *">
                <input type="text" name="ghichu" placeholder="Ghi chú">
                <label for="thanhtoan">Hình thức thanh toán</label>
                <select style="height: 40px;margin-bottom: 10px;"
										name="thanhtoan">
                    <option selected value="1">Thanh toán khi nhận hàng</option>
                    <option value="0">Thanh toán qua ZaloPay</option>
                </select>
                <div class="row" style="text-align: center;margin-bottom: 150px;">

                    <button class="btn btn-primary">Hoàn tất</button>
                </div>


            </form>
        </div>

    </div>
</div> -->
<div class="container d-flex justify-content-center text-center">
    <div class="card px-5 py-5">
        <h1>Thông tin thanh toán</h1>
        <span>Vui lòng điền đầy đủ thông tin để thanh toán</span>
        <form action="/product/cart/checkout" method="post">
        {{ csrf_field() }}
        <div class="row mt-2">
            <div class="col-md-6"> <input type="text" name="hoten" class="form-control" placeholder="Họ tên" /> </div>
            <div class="col-md-6"> <input type="number" name="sodienthoai" class="form-control" placeholder="Số điện thoại" /> </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6"> <input type="text" name="email" class="form-control" placeholder="Email" /> </div>
            <div class="col-md-6"> <input type="text" name="diachi" class="form-control" placeholder="Địa chỉ" /> </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12"> <textarea rows="2" class="form-control" name="ghichu" placeholder="Lưu ý với shop hoặc bên giao hàng"></textarea> </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <select style="width:100%" name="thanhtoan">
                    <option selected value="1">Thanh toán khi nhận hàng</option>
                    <option value="0">Thanh toán qua ZaloPay</option>
                </select>
            </div>
        </div>
        @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    <ul>
                        <li>{{$err}}</br></li>
                    </ul>

                    @endforeach
                </div>
                @endif
                @if(Session::has('thanhcong'))
                <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                @endif
                @if(Session::has('thatbai'))
                <div class="alert alert-danger">{{Session::get('thatbai')}}</div>
                @endif
        <button class="btn btn-primary mt-5">Thanh toán<i class="fa fa-long-arrow-right ml-2 mt-1"></i></button>
        </form>

    </div>
</div>
@endsection
