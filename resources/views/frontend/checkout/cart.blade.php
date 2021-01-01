@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>


        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="name">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td class="total">Xóa</td>

                    </tr>
                </thead>
                <tbody>

                    @foreach($list as $item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{url('/image/products')}}/{{$item->attributes->img}}" height=60></a>
                        </td>
                        <td class="cart_description">
                            <h4>
                                <a href="">{{$item->name}}</a>

                            </h4>

                        </td>
                        <td class="cart_price">
                            <p>{{number_format($item->price)}}đ</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_down" href="/product/giam-san-pham/{{$item->id}}"> - </a>
                                <input class="cart_quantity_input" disabled type="text" name="quantity" value='{{$item->quantity}}' autocomplete="off" size="2">
                                <a class="cart_quantity_up" href="/product/tang-san-pham/{{$item->id}}"> + </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{number_format($item->price*$item->quantity)}}đ</p>
                        </td>
                        <td class="cart_remove">
                            <a href="/product/xoa-san-pham/{{$item->id}}" onclick="return  confirm('Bạn có muốn xóa không?')">X</a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
<section id="do_action">
		<div class="container">
				<div class="col-sm-12">
					<div class="total_area float-right">
						<ul>
							<li>Tổng tiền: <i style="color:red;font-size: 150%">
							{{$total_money}} VNĐ</i>
							</li>
						</ul>
							<a class="btn btn-default update" href="index">Tiếp tục mua hàng</a>
							<a class="btn btn-default check_out" href="/product/cart/checkout">Đặt hàng</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
<script>
    var msg = '{{Session::get('jsAlert')}}';
    var exist = '{{Session::has('jsAlert')}}';
    if(exist){
      alert(msg);
    }
  </script>
<!--/#cart_items-->
@endsection
