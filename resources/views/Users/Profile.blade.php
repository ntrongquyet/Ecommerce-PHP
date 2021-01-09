@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
<div class="container-fluid">
    <table class="table">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Tên người nhận</th>
            <th>Tổng đơn hàng</th>
            <th>Ngày mua</th>
            <th>Trạng thái</th>
          </tr>
        </thead>
        <tbody>
            @foreach($listPurchases as $item)
            <tr>
                <td>{{$item->id_purchase}}</td>
                <td>{{$item->name}}</td>
                <td>{{number_format($item->total, 0, '', '.')}} VNĐ</td>
                <td> {{$item->created_at}}</td>
                <td><label class="badge {{$item->status == '1'?'badge-secondary':($item->status == '2'?'badge-danger':($item->status == '3'?'badge-light':($item->status == '4'?'badge-warning':'badge-success')))}}">{{$item->description}}</label></td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>


<div class="row">
    <div class="col-9">
    <div class="section-main-3">
<div class="all-product section-3">
    <div class="section-title">
        <h2 class="title-product-like">Các sản phẩm đã thích</h2>
    </div>
    <div class="row justify-content-md-center" id="like-product">
        @foreach($likedProducts as $product)
        <div class="col-md-4" id="list-product">
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
                <p class="btn btn-primary float-right btn-price" data-key="{{$product->id_product}}" data-abc="true"> Mua ngay </p>
            </figure>
        </div>
        @endforeach
    </div>
</div></div>
    </div>
</div>

{{-- <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách các món hàng đã mua</h4>
                        <p class="card-description"> Khách hàng: </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên người nhận</th>
                                        <th>Tổng đơn hàng</th>
                                        <th>Ngày mua</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listPurchases as $item)
                                    <tr>
                                        <td>{{$item->id_purchase}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{number_format($item->total, 0, '', '.')}} VNĐ</td>
                                        <td> {{$item->created_at}}</td>
                                        <td><label class="badge {{$item->status == '1'?'badge-secondary':($item->status == '2'?'badge-danger':($item->status == '3'?'badge-light':($item->status == '4'?'badge-warning':'badge-success')))}}">{{$item->description}}</label></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<script type="text/javascript">
$(document).ready(function() {
        //phân trang
        $('#like-product').after(
            '<div class="row mt-2"><nav id="pageginNum" aria-label="Page navigation example pagination-secondary" style="margin: 0 auto"><ul id="nav" class="pagination"></ul></div>'
            );
        var rowsShown = 9;
        var rowsTotal = $('#like-product #list-product').length;
        var numPages = rowsTotal / rowsShown;
        if(numPages > 1)
        {
            for (i = 0; i < numPages; i++) {
                var pageNum = i + 1;
                $('#nav').append(
                    '<li class="page-item"><a class="page-link" rel="' +
                    i + '">' + pageNum + '</a></li> ');
            }
            $('#like-product #list-product').hide();
            $('#like-product #list-product').slice(0, rowsShown).show();
            $('#nav a:first').addClass('active');
            $('#nav a').bind('click', function() {
                $('#nav a').removeClass('active');
                $(this).addClass('active');
                var currPage = $(this).attr('rel');
                var startItem = currPage * rowsShown;
                var endItem = startItem + rowsShown;
                $('#like-product #list-product').css('opacity', '0.0').hide().slice(
                    startItem, endItem).
                css('display', 'table-row').animate({
                    opacity: 1
                }, 300);
            });
        }
        //phân trang

});
</script>
@endsection
