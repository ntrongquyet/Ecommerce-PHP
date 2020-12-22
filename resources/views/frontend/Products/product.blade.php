@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
<div class="col-sm-3 product">
        <div class="product-image">
            <img src="{{url('/image/default.jpg')}}" />
            <div class="addToCart">
                <a href="#">Thêm giỏ hàng</a>
            </div>
        </div>

        <div class="info-product">
            <span class="title">
                {{$product->name}}
            </span>
            <span class="price">
                {{$product->price}}
            </span>
        </div>
    <a href=# class="likedItem">
        <i class="far fa-heart"></i>
    </a>
</div>
@endsection
