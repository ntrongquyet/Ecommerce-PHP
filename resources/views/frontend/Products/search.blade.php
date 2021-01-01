@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
<div class="container">
    @if(isset($listProduct))
    @if(count($listProduct) == 0)
    không tìm thấy
    @else
    <div class="row">
            @foreach($listProduct as $product)
            <div class="col-sm-4 product">
                <div class="single-product">
                    <a href="/{{$product->id_Cat}}/{{$product->id_product}}">
                        <div class="single-product image">
                            <img src="{{url('/image/products')}}/{{$product->avatar}}" />
                            <div class="addToCart">
                                <a href="#">Thêm giỏ hàng</a>
                            </div>
                        </div>
                </div>
                <!-- <div class="info-product">
                    <div class="title">
                        {{$product->name}}
                    </div>
                    <div class="price">
                        {{$product->price}}
                    </div>

                </div> -->
                <div class="product-content">
                    <span><a href="/{{$product->id_Cat}}/{{$product->id_product}}">{{$product->name}}</a></span>
                    <div class="product-price">
                        <span>{{number_format($product->price, 0, '', ',')}}VNĐ</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
    @endif
</div>
@endsection