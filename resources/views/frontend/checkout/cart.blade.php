@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')
		<p style="color: white;">{{$i=1}}</p>
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
							<td class="image">Tên sản phẩm</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td class="total">Cập nhật</td>
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
										<a class="cart_quantity_up" href=""> + </a>
										<input class="cart_quantity_input" type="text" name="quantity"
										value='{{$item->quantity}}' autocomplete="off" size="2">
										<a class="cart_quantity_down" href=""> - </a>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">{{number_format($item->price*$item->qty)}}đ</p>
								</td>
								<td class="cart_update">
									<a href=""><i class="fa fa-refresh" aria-hidden="true"></i></a>
								</td>
								<td class="cart_remove">
									<a href="index/xoa-san-pham/{{$item->rowId}}"
									onclick="return  confirm('Bạn có muốn xóa không?')"
										>X</a>
								</td>

							</tr>
							@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection
