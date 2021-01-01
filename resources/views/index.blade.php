@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')

@if(isset($categoryList))
<div class="row">
    <div class="col mt-3 pt-3 pb-3 bg-white">
        <div class="btn-group-vertical">

            @foreach($categoryList as $itemCat)
            <div class="btn-group dropright">
                <a type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$itemCat->name}}
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-9 mt-3 pt-3 pb-3 bg-white">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://lenxetv.com/wp-content/uploads/2020/05/Xe-VinFast-Power-wallpaper-len-xe-tv-1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://lenxetv.com/wp-content/uploads/2020/05/Xe-VinFast-Power-wallpaper-len-xe-tv-1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://lenxetv.com/wp-content/uploads/2020/05/Xe-VinFast-Power-wallpaper-len-xe-tv-1.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
@endif

@if(isset($topSaleProduct))
<div class="popular-product section">
    <div class="section-title">
        <h2>Sản phẩm bán chạy nhất</h2>
    </div>
    <div class="row container-fluid">
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="owl-carousel">

                @foreach($topSaleProduct as $product)
                <div class="item">
                    <div class="product">
                        <a href="/{{$product->id_Cat}}/{{$product->id_product}}">
                            <div class="product-image">
                                <img src="{{url('/image/products')}}/{{$product->avatar}}" />
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
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<div class="all-product section">
    <div class="section-title">
        <h2>Tất cả sản phẩm</h2>
    </div>
    <div class="row">
        @foreach($productList as $product)
        <div class="col-sm-4 product">
            <div class="single-product">
                    <div class="single-product image">
                        <img src="{{url('/image/products')}}/{{$product->avatar}}" />
                        <div class="addToCart">
                            <a href="product/addToCart/{{$product->id_product}}" onclick="return alert('Thêm vào giỏ hàng thành công')">Thêm giỏ hàng
                            </a>
                        </div>
                    </div>
            </div>

            <div class="product-content">
                <span><a href="/{{$product->id_Cat}}/{{$product->id_product}}">{{$product->name}}</a></span>
                <div class="product-price">
                    <span>{{number_format($product->price, 0, '', ',')}}VNĐ</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="row">
    <nav aria-label="Page navigation example">
        {{ $productList->links() }}
    </nav>
</div>
@endif
@endsection
