@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="container-fluid">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="{{url('/image/products')}}/{{$product->avatar}}" /></div>
                        @php($counter=2)
                        @foreach($imageDetail as $image)
                        <div class="tab-pane" id="pic-{{$counter}}"><img src="{{url('/image/products')}}/{{$image->image}}" /></div>
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

                    <li><a data-target="#pic-{{$counter}}" data-toggle="tab"><img src="{{url('/image/products')}}/{{$image->image}}" /></a>
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
            <div class="col-md-6">
                <div class="details">
                    <h3 class="product-title"> {{$product->name}}</h3>
                    <p class="product-description">{{$product->description}}</p>
                    <h4 class="price">Giá: <span><?php echo number_format($product->price, 0); ?> VNĐ</span></h4>
                    <p class="vote">Số lượt thích <strong>{{$product->liked}}</strong></p>
                    <p class="vote">Sản phẩm trong kho <strong>{{$product->quantity}}</strong></p>
                    <div class="action">
                        <div class="row mt-4 no-gutters mx-auto">
                            <form method="get" action="/product/addToCart/{{$product->id_product}}">

                                <div class="col-auto mr-2">
                                    {{ csrf_field() }}

                                    <input type="number" step="1" min="1" max="{{$product->quantity}}" name="quantity" class="form-control" />
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-dark text-primary font-weight-bold add-item-btn">Thêm vào giỏ hàng</button></div>

                            </form>
                        </div>
                        @if (session()->has('user'))
                        <button class="like btn btn-default" type="button"><a class="fa fa-heart" href="/product/liked/{{$product->id_product}}"></a></button>
                        @else
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart" href="/product/liked/{{$product->id_product}}"></span></button>
                        @endif
                    </div>
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
</div>
<div class="container mb-5 mt-5 comment">
    <div class="card">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center mb-5"> Nhận xét sản phẩm </h3>
                <div class="row">
                    @foreach($listComments as $cmt)
                    <div class="col-md-12">
                        <div class="media">
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-8 d-flex">
                                        <h5>{{$cmt->username}}</h5> <span> - {{date("d-m-Y", strtotime($cmt->time))}}</span>
                                    </div>

                                </div> {{$cmt->content}}

                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
