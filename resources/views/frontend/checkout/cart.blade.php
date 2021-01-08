@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
@if (count($list)>0)
<div class="cart_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Giỏ hàng<small> ({{count($list)}} sản phẩm trong giỏ) </small></div>
                    <div class="cart_items flex-column d-flex justify-content-around">
                        <ul class="cart_list">
                            @foreach($list as $item)
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{url('/image/products')}}/{{$item->attributes->img}}" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-around">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Tên SP</div>
                                        <div class="cart_item_text"><a href="/{{$item->attributes->cat}}/{{$item->id}}">{{$item->name}}</a></div>
                                    </div>

                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Số lượng</div>

                                        <div class="cart_item_text">
                                            <a class="cart_quantity_down" href="/product/giam-san-pham/{{$item->id}}"> <i class="fas fa-minus"></i> </a>
                                            {{$item->quantity}}
                                            <a class="cart_quantity_up" href="/product/tang-san-pham/{{$item->id}}"> <i class="fas fa-plus"></i>  </a>
                                        </div>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Giá tiền</div>
                                        <div class="cart_item_text">{{number_format($item->price, 0, '', '.')}} VNĐ</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Tổng cộng</div>
                                        <div class="cart_item_text">{{number_format($item->price*$item->quantity,0,'','.')}} VNĐ</div>
                                    </div>
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Xoá</div>
                                        <div class="cart_item_text">
                                            <a href="/product/xoa-san-pham/{{$item->id}}" onclick="return  confirm('Bạn có muốn xóa không?')">X</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Tổng hoá đơn:</div>
                            <div class="order_total_amount">{{number_format($total_money, 0, '', '.')}} VNĐ</div>
                        </div>
                    </div>
                    <div class="cart_buttons">
                    <a href="/" class="btn btn-secondary cart-btn-transform m-1" data-abc="true">Tiếp tục mua sắm</a>
                    <a href="/product/cart/checkout" class="btn btn-primary cart-btn-transform m-3 btn-price-end" data-abc="true">Thanh toán</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container-fluid mt-100">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Giỏ hàng</h5>
                </div>
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Giỏ hàng của bạn đang trống</strong></h3>
                        <h4>Chúc bạn mua sắm vui vẻ <i class="far fa-smile-beam"></i> </h4> <a href="/" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Tiếp tục mua sắm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script>
    var msg = '{{Session::get('
    jsAlert ')}}';
    var exist = '{{Session::has('
    jsAlert ')}}';
    if (exist) {
        alert(msg);
    }
</script>
@endsection
