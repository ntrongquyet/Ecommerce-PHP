@extends('layouts.default')
@section('title',$product->name)
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
                    <h3 class="product-title" style="font-size: 24;"> {{$product->name}}
                        <button class="like btn btn-default d-inline" type="button" id="{{$product->id_product}}"
                            style="transform: translate(-30%, 0%);
                            font-size: 24;">

                            @if($liked)
                            <a class="fa fa-heart" style="color: red;" id="heart"></a>

                            @else
                            <a class="fa fa-heart" id="heart"></a>

                            @endif
                        </button>
                    </h3>
                    <p class="product-description">{{$product->description}}</p>
                    <h4 class="price">Giá: <span><?php echo number_format($product->price, 0); ?> VNĐ</span></h4>
                    <p>Số lượt thích <strong id="likes">{{$product->liked}}</strong></p>
                    <p>Sản phẩm trong kho <strong>{{$product->quantity}}</strong></p>
                    <div class="action">
                        <div class="row mt-4 no-gutters mx-auto">

                            <form method="get" action="/product/addToCart/{{$product->id_product}}">

                                <div class="mr-2">
                                    {{ csrf_field() }}
                                    <p>Số lượng</p>

                                    <input type="number" step="1" min="1" max="{{$product->quantity}}" name="quantity" class="form-control" />
                                </div>
                                <div>
                                    <button type="submit" style="margin-top:20px " class="btn btn-outline-dark text-primary font-weight-bold add-item-btn">Thêm
                                        vào giỏ hàng</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container mb-5 mt-5 comment">

    <div class="card">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('user'))
                <div class="well">
                    <h3 class="text-center mb-5">Viết bình luận</h3>
                    <form action="/product/comment/{{$product->id_product}}" method="post">
                        @csrf

                        @method('POST')
                        <div class="form mb-2">
                            <textarea class="form-control" rows="2" name="textComment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                    </form>
                </div>
                @endif
            </div>
            <div class="col-md-12">
                <h3 class="text-center mb-5"> Nhận xét sản phẩm </h3>
                <div class="row">
                    @foreach($listComments as $cmt)
                    <div class="col-md-12">
                        <div class="media">
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-8 d-flex">
                                        <h5>{{$cmt->username}}</h5> <span> -
                                            {{date("d-m-Y", strtotime($cmt->time))}}</span>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('.like').click(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = $(this).attr('id');
            console.log(id);
            $.ajax({
                type: 'POST',
                url: "{{ route('ajax.likeProduct') }}",
                data: {
                    id: id,
                },
                success: function(response) {
                    var test = response.check;
                    console.log(test);
                    $('#likes').text(response.liked);
                    var heart = document.getElementById("heart");
                    var likes = document.getElementById("likes");
                    var check = response.liked;
                    var product = response.product;
                    if (check == undefined) {
                        window.location.replace("/login");
                    }
                    if (check) {
                        heart.style.color = "red";
                        likes.innerHTML = product.liked;
                    } else {
                        heart.style.color = "black";

                        likes.innerHTML = product.liked;
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })
    });
</script>
@endsection
