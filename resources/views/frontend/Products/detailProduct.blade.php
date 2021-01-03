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
                        <div class="tab-pane active" id="pic-1"><img
                                src="{{url('/image/products')}}/{{$product->avatar}}" /></div>
                        @php($counter=2)
                        @foreach($imageDetail as $image)
                    <div class="tab-pane" id="pic-{{$counter}}"><img
                            src="{{url('/image/products')}}/{{$image->image}}" /></div>
                    @php($counter=$counter+1)

                    @endforeach

                    {{-- <div class="tab-pane" id="pic-2"><img src="{{url('/image/default.jpg')}}" />
                </div>
                <div class="tab-pane" id="pic-3"><img src="{{url('/image/default.jpg')}}" /></div>
                <div class="tab-pane" id="pic-4"><img src="{{url('/image/default.jpg')}}" /></div>
                <div class="tab-pane" id="pic-5"><img src="{{url('/image/default.jpg')}}" /></div> --}}

            </div>
            <ul class="preview-thumbnail nav nav-tabs">
                {{-- <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                            src="{{url('/image/products')}}/{{$product->avatar}}" /></a></li> --}}
                @php($counter=2)
                @foreach($imageDetail as $image)

                <li><a data-target="#pic-{{$counter}}" data-toggle="tab"><img
                            src="{{url('/image/products')}}/{{$image->image}}" /></a>
                </li>
                @php($counter=$counter+1)

                @endforeach
                {{--
                        <li><a data-target="#pic-2" data-toggle="tab"><img src="{{url('/image/default.jpg')}}" /></a>
                </li>
                <li><a data-target="#pic-3" data-toggle="tab"><img src="{{url('/image/default.jpg')}}" /></a>
                </li>
                <li><a data-target="#pic-4" data-toggle="tab"><img src="{{url('/image/default.jpg')}}" /></a>
                </li>
                <li><a data-target="#pic-5" data-toggle="tab"><img src="{{url('/image/default.jpg')}}" /></a>
                </li>--}}
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
                @if (session()->has('user'))
                <button class="like btn btn-default" type="button"><a class="fa fa-heart" href="/product/liked/{{$product->id_product}}"></a></button>
                @else
                <button class="like btn btn-default" type="button"><span class="fa fa-heart" href="/product/liked/{{$product->id_product}}"></span></button>
                @endif
            </div>
        </div>
    </div>
</div>
<hr />
@if (session()->has('user'))
<div class="well">
    <h4>Viết bình luận</h4>
    <form role="form">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{$product->id_product}}" />
        <div class="form" style="margin-bottom: 10px;">
            <textarea class="form-control" rows="10" name="textcomment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi bình luận</button>
    </form>
</div>

@endif
</div>

<!-- 
    <div class="card-column">
        @foreach($listProductAsCat as $itemCat)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" data-src="..." alt="Card image cap">
            <div class="card-block">
                <h4 class="card-title">{{$itemCat->name}}</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                    content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        @endforeach
    </div> -->
</div>

@endsection