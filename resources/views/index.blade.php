@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')

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
                        <img src="{{url('/image/default.jpg')}}" />
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
                <a href="/{{$product->id_Cat}}/{{$product->id_product}}">
                    <div class="single-product image">
                        <img src="{{url('/image/default.jpg')}}" />
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
    
</div>
<!-- phần phân trang -->
<div>
    <!-- nếu current_page > 1 và total_page > 1 mới hiển thị nút prev -->
    @if ($currentPage > 1 && $totalPage > 1)
        <a href="/{{$currentPage - 1}}">Prev</a>
    @endif

    @for ($i = 1; $i <= $totalPage; $i++)
        <!--Nếu là trang hiện tại thì hiển thị thẻ span
        ngược lại hiển thị thẻ a -->
        @if ($i == $currentPage)
            <span>{{$i}}</span>
        @else
            <a href="/{{$i}}">{{$i}}</a>
        @endif
    @endfor

    <!-- nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev -->
    @if ($currentPage < $totalPage && $totalPage > 1)
        <a href="/{{$currentPage+1}}">Next</a>
    @endif
</div>
@endif

@endsection
