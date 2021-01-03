@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')

@if(isset($categoryList))
<div class="row justify-content-center">
    <div class="col-3 bg-white">
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
    <div class="col-6 mt-3 pt-3 pb-3 bg-white">
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
<div class="popular-product section">
    <div class="section-title">
        <h2>Sản phẩm bán chạy nhất</h2>
    </div>
    <div class="row container-fluid">
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="owl-carousel">

                @foreach($topSaleProduct as $product)
                <div>
                    <figure class="card card-product-grid card-lg"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="img-wrap" data-abc="true">
                            <img src="{{url('/image/products')}}/{{$product->avatar}}"></a>
                        <figcaption class="info-wrap">
                            <div class="row">
                                <div class="col-md-8"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="title" data-toggle="tooltip" data-placement="bottom" title="{{$product->name}}" data-abc="true">{{$product->name}}</a> </div>
                                <div class="col-md-4 rating-edit">
                                    <div class="rating text-right"> <i class="fas fa-heart"></i> {{$product->liked}}
                                    </div>
                                </div>
                            </div>
                        </figcaption>
                        <div class="bottom-wrap"> <a href="product/addToCart/{{$product->id_product}}" class="btn btn-primary float-right btn-price" data-abc="true"> Mua ngay </a>
                            <div class="price-wrap"> <span class="price h5">{{number_format($product->price, 0, '', ',')}} VNĐ</span> <br>
                                <small class="text-success">Free shipping</small> </div>
                        </div>
                    </figure>
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
        <div class="col-md-4">
            <figure class="card card-product-grid card-lg"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="img-wrap" data-abc="true">
                    <img src="{{url('/image/products')}}/{{$product->avatar}}"></a>
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-8"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="title" data-toggle="tooltip" data-placement="bottom" title="{{$product->name}}" data-abc="true">{{$product->name}}</a> </div>
                        <div class="col-md-4 rating-edit">
                            <div class="rating text-right"> <i class="fas fa-heart"></i> {{$product->liked}}</div>
                        </div>
                    </div>
                </figcaption>
                <div class="bottom-wrap">
                    <a href="product/addToCart/{{$product->id_product}}/1" class="btn btn-primary float-right btn-price" data-abc="true"> Mua ngay
                    </a>
                    <div class="price-wrap"> <span class="price h5">{{number_format($product->price, 0, '', ',')}}
                            VNĐ</span> <br> <small class="text-success">Free shipping</small> </div>
                </div>
            </figure>
        </div>
        @endforeach
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
<div class="all-product section">
    <div class="section-title">
        <h2>Sản Phẩm được yêu thích nhất</h2>
    </div>
    <div class="row">
        @foreach($topLikeProduct as $product)
        <div class="col-md-4">
            <figure class="card card-product-grid card-lg"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="img-wrap" data-abc="true">
                    <img src="{{url('/image/products')}}/{{$product->avatar}}"></a>
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-8"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="title" data-toggle="tooltip" data-placement="bottom" title="{{$product->name}}" data-abc="true">{{$product->name}}</a> </div>
                        <div class="col-md-4 rating-edit">
                            <div class="rating text-right"> <i class="fas fa-heart"></i> {{$product->liked}}</div>
                        </div>
                    </div>
                </figcaption>
                <div class="bottom-wrap"> <a href="product/addToCart/{{$product->id_product}}" class="btn btn-primary float-right btn-price" data-abc="true"> Mua ngay </a>
                    <div class="price-wrap"> <span class="price h5">{{number_format($product->price, 0, '', ',')}}
                            VNĐ</span> <br> <small class="text-success">Free shipping</small> </div>
                </div>
            </figure>
        </div>
        @endforeach
    </div>
</div>
@endif

@if(isset($topNewProduct))
<div class="all-product section">
    <div class="section-title">
        <h2>Sản Phẩm mới nhất</h2>
    </div>
    <div class="row">
        @foreach($topNewProduct as $product)
        <div class="col-md-4">
            <figure class="card card-product-grid card-lg"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="img-wrap" data-abc="true">
                    <img src="{{url('/image/products')}}/{{$product->avatar}}"></a>
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-8"> <a href="/{{$product->id_Cat}}/{{$product->id_product}}" class="title" data-toggle="tooltip" data-placement="bottom" title="{{$product->name}}" data-abc="true">{{$product->name}}</a> </div>
                        <div class="col-md-4 rating-edit">
                            <div class="rating text-right"> <i class="fas fa-heart"></i> {{$product->liked}}</div>
                        </div>
                    </div>
                </figcaption>
                <div class="bottom-wrap">

                    <a href="product/addToCart/{{$product->id_product}}" class="btn btn-primary float-right btn-price" data-abc="true"> Mua ngay </a>
                    <div class="price-wrap"> <span class="price h5">{{number_format($product->price, 0, '', ',')}}
                            VNĐ</span> <br> <small class="text-success">Free shipping</small> </div>
                </div>
            </figure>
        </div>
        @endforeach
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
