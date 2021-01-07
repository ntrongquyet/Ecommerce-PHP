@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
<div class="menu-main">
        <nav class="nav">
            <ul class="menu">
                <li class="menu-item">
                    <img src="{{url('/image/icon/mobile-phone.svg')}}" class="menu-link-icon" width="20px" height="auto" alt="phone">
                    <a href="#" class="menu-link">Điện thoại</i> </a>
                </li>
                <li class="menu-item">
                    <img src="{{url('/image/icon/laptop.svg')}}" class="menu-link-icon" width="20px" height="auto" alt="laptop">
                    <a href="#" class="menu-link">Laptop</i> </a>
                </li>
                <li class="menu-item">
                    <img src="{{url('/image/icon/tablet.svg')}}" class="menu-link-icon" width="20px" height="auto" alt="tablet">
                    <a href="#" class="menu-link">Máy tính bảng</i> </a>
                </li>
                <li class="menu-item">
                    <img src="{{url('/image/icon/television.svg')}}" class="menu-link-icon" width="20px" height="auto" alt="tivi">
                    <a href="#" class="menu-link">Tivi</i> </a>
                </li>
                <li class="menu-item">
                    <img src="{{url('/image/icon/speaker.svg')}}" class="menu-link-icon" width="20px" height="auto" alt="loa">
                    <a href="#" class="menu-link">Loa - Karaoke</i> </a>
                </li>
                <li class="menu-item">
                    <img src="{{url('/image/icon/information.svg')}}" class="menu-link-icon" width="20px" height="auto" alt="loa">
                    <a href="#" class="menu-link">Tin công nghệ</i> </a>
                </li>
            </ul>
        </nav>
</div>
@if(isset($categoryList))
<div class="row">
    <div class="col-9">
        <div id="carouselExampleIndicators" class="carousel slide carousel" data-ride="carousel">
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
<div class="row">
    <div class="col-9">
    <div class="section-main">
<div class="popular-product section-1"> 
    <div class="section-title">
        <h2 class="title-best-product">Sản phẩm bán chạy nhất</h2>
    </div>
    <div class="row container-fluid">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="owl-carousel">
                @foreach($topSaleProduct as $product)
                <div>
                    <figure class="card card-product-grid card-lg">
                         <a href="/{{$product->id_Cat}}/{{$product->id_product}}" 
                         class="img-wrap" data-abc="true">
                            <img src="{{url('/image/products')}}/{{$product->avatar}}"></a>
                        <figcaption class="info-wrap">
                            <div class="row ">
                                <div class="col-md-9"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="title" data-toggle="tooltip" data-placement="bottom" title="{{$product->name}}" data-abc="true">{{$product->name}}</a> </div>
                                <div class="col-md-3 rating-edit">
                                    <div class="rating text-right"> <i class="fas fa-heart"></i> {{$product->liked}}
                                    </div>
                                </div>
                            </div>
                        </figcaption>
                        <div class="bottom-wrap"> 
                            <div class="price-wrap"> <span class="price h5">{{number_format($product->price, 0, '', ',')}} VNĐ</span> <br>
                                <small class="text-success">Free shipping</small> </div>
                        </div>
                        <a href="product/addToCart/{{$product->id_product}}" class="btn btn-primary float-right btn-price" data-abc="true"> Mua ngay </a>
                    </figure>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
</div>
    </div>
</div>

<div class="row">
    <div class="col-9">
        <div class="section-main-2">
<div class="all-product section-2">
    <div class="section-title">
        <h2 class="title-all-product">Tất cả sản phẩm</h2>
    </div>
    <div class="row justify-content-md-center">
        @foreach($productList as $product)
        <div class="col-md-4">
            <figure class="card card-product-grid card-lg"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="img-wrap" data-abc="true">
                    <img src="{{url('/image/products')}}/{{$product->avatar}}"></a>
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-9 "> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="title" data-toggle="tooltip" data-placement="bottom" title="{{$product->name}}" data-abc="true">{{$product->name}}</a> </div>
                        <div class="col-md-3 rating-edit">
                            <div class="rating text-right"> <i class="fas fa-heart"></i> {{$product->liked}}</div>
                        </div>
                    </div>
                </figcaption>
                <div class="bottom-wrap">
                    <div class="price-wrap"> <span class="price h5">{{number_format($product->price, 0, '', ',')}}
                            VNĐ</span> <br> <small class="text-success">Free shipping</small> </div>
                </div>
                <a href="product/addToCart/{{$product->id_product}}" class="btn btn-primary float-right btn-price" data-abc="true"> Mua ngay
                    </a>
            </figure>
        </div>
        @endforeach
    </div>
</div>
</div>
    </div>
</div>

</div>
<div class="row mt-2">
    <nav aria-label="Page navigation example" style="margin: 0 auto">
        {{ $productList->links() }}
    </nav>
</div>
@endif

@if(isset($topLikeProduct))
<div class="row">
    <div class="col-9">
    <div class="section-main-3">
<div class="all-product section-3">
    <div class="section-title">
        <h2 class="title-product-like">Sản Phẩm Được Yêu Thích Nhất</h2>
    </div>
    <div class="row justify-content-md-center">
        @foreach($topLikeProduct as $product)
        <div class="col-md-4">
            <figure class="card card-product-grid card-lg"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="img-wrap" data-abc="true">
                    <img src="{{url('/image/products')}}/{{$product->avatar}}"></a>
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-9"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="title" data-toggle="tooltip" data-placement="bottom" title="{{$product->name}}" data-abc="true">{{$product->name}}</a> </div>
                        <div class="col-md-3 rating-edit">
                            <div class="rating text-right"> <i class="fas fa-heart"></i> {{$product->liked}}</div>
                        </div>
                    </div>
                </figcaption>
                <div class="bottom-wrap"> 
                    <div class="price-wrap"> <span class="price h5">{{number_format($product->price, 0, '', ',')}}
                            VNĐ</span> <br> <small class="text-success">Free shipping</small> 
                        </div>
                </div>
                <a href="product/addToCart/{{$product->id_product}}" class="btn btn-primary float-right btn-price" data-abc="true"> Mua ngay </a>
            </figure>
        </div>
        @endforeach
    </div>
</div></div>
    </div>
</div>
@endif

@if(isset($topNewProduct))
<div class="row">
    <div class="col-9">
    <div class="section-main-4">
<div class="all-product section-4">
    <div class="section-title">
        <h2 class="title-new-product">Sản Phẩm Mới Nhất</h2>
    </div>
    <div class="row justify-content-md-center">
        @foreach($topNewProduct as $product)
        <div class="col-md-4">
            <figure class="card card-product-grid card-lg"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="img-wrap" data-abc="true">
                    <img src="{{url('/image/products')}}/{{$product->avatar}}"></a>
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-9"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="title" data-toggle="tooltip" data-placement="bottom" title="{{$product->name}}" data-abc="true">{{$product->name}}</a> </div>
                        <div class="col-md-3 rating-edit">
                            <div class="rating text-right"> <i class="fas fa-heart"></i> {{$product->liked}}</div>
                        </div>
                    </div>
                </figcaption>
                <div class="bottom-wrap">                    
                    <div class="price-wrap"> <span class="price h5">{{number_format($product->price, 0, '', ',')}}
                            VNĐ</span> <br> <small class="text-success">Free shipping</small> 
                        </div>
                    </div>
                      <a href="product/addToCart/{{$product->id_product}}" class="btn btn-primary float-right btn-price" data-abc="true"> Mua ngay </a>
            </figure>
        </div>
        @endforeach
    </div>
</div>
</div>
    </div>
</div>
<script>
    var msg = '{{Session::get('
    jsAlert ')}}';
    var exist = '{{Session::has('
    jsAlert ')}}';
    if (exist) {
        alert(msg);
    }
</script>
@endif

@endsection
