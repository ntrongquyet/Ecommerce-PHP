@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
<!-- <div class="col-sm-3 product">
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
</div> -->
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="{{url('/image/default.jpg')}}" /></div>
                        <div class="tab-pane" id="pic-2"><img src="{{url('/image/default.jpg')}}" /></div>
                        <div class="tab-pane" id="pic-3"><img src="{{url('/image/default.jpg')}}" /></div>
                        <div class="tab-pane" id="pic-4"><img src="{{url('/image/default.jpg')}}" /></div>
                        <div class="tab-pane" id="pic-5"><img src="{{url('/image/default.jpg')}}" /></div>
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                        <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                    src="{{url('/image/default.jpg')}}" /></a></li>
                        <li><a data-target="#pic-2" data-toggle="tab"><img src="{{url('/image/default.jpg')}}" /></a>
                        </li>
                        <li><a data-target="#pic-3" data-toggle="tab"><img src="{{url('/image/default.jpg')}}" /></a>
                        </li>
                        <li><a data-target="#pic-4" data-toggle="tab"><img src="{{url('/image/default.jpg')}}" /></a>
                        </li>
                        <li><a data-target="#pic-5" data-toggle="tab"><img src="{{url('/image/default.jpg')}}" /></a>
                        </li>
                    </ul>

                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"> {{$product->name}}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 lượt xem</span>
                    </div>
                    <p class="product-description">{{$product->description}}</p>
                    <h4 class="price">Giá: <span><?php echo number_format($product->price, 0); ?> VNĐ</span></h4>
                    <p class="vote">Số lượt thích <strong>{{$product->liked}}</strong></p>
                    <h5 class="sizes">kích thước:
                        <span class="size" data-toggle="tooltip" title="small">s</span>
                        <span class="size" data-toggle="tooltip" title="medium">m</span>
                        <span class="size" data-toggle="tooltip" title="large">l</span>
                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                    </h5>
                    <h5 class="colors">màu sắc:
                        <span class="color white not-available" data-toggle="tooltip" title="Not In store"></span>
                        <span class="color red"></span>
                        <span class="color black"></span>
                    </h5>
                    <div class="action">
                        <button class="add-to-cart btn btn-default" type="button">Thêm vào giỏi hàng</button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection