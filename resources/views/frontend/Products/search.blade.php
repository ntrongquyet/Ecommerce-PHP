@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
<div class="all-product section">
    @if(isset($listProduct))
    @if(count($listProduct) == 0)
    không tìm thấy sản phẩm
    @else
    <div class="row justify-content-md-center">
        @foreach($listProduct as $product)
        <div class="col-md-4">
            <figure class="card card-product-grid card-lg"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}"
                    class="img-wrap" data-abc="true">
                    <img src="{{url('/image/products')}}/{{$product->avatar}}"></a>
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-9"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="title"
                                data-toggle="tooltip" data-placement="bottom" title="{{$product->name}}"
                                data-abc="true">{{$product->name}}</a> </div>
                        <div class="col-md-3 rating-edit">
                            <div class="rating text-right"> <i class="fas fa-heart"></i> {{$product->liked}}</div>
                        </div>
                    </div>
                </figcaption>
                <div class="bottom-wrap">

                    <div class="price-wrap"> <span class="price h5">{{number_format($product->price, 0, '', ',')}}
                            VNĐ</span> <br> <small class="text-success">Free shipping</small> </div>
                </div>
                <a href="product/addToCart/{{$product->id_product}}" class="btn btn-primary float-right btn-price"
                    data-abc="true"> Mua ngay
                </a>
            </figure>
        </div>
        @endforeach
    </div>
    @endif
    @endif
</div>

@endsection