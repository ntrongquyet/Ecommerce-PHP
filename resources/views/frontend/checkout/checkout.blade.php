@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
<div class="col-sm-8">
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
</div>
@endsection
