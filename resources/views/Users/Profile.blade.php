@extends('layouts.default')
@section('title','Trang chủ')
@section ('sidebar')
@parent
@endsection
@section('content')

<div class="page-content page-container" id="page-content">
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
                                    <!-- <tr>
                                        <td>Samso Palto</td>
                                        <td>Brakes</td>
                                        <td class="text-danger"> 11.06% <i class="fa fa-arrow-down"></i></td>
                                        <td><label class="badge badge-warning">In progress</label></td>
                                    </tr>
                                    <tr>
                                        <td>Tiplis mang</td>
                                        <td>Window</td>
                                        <td class="text-danger"> 35.00% <i class="fa fa-arrow-down"></i></td>
                                        <td><label class="badge badge-info">Fixed</label></td>
                                    </tr>
                                    <tr>
                                        <td>Pter parker</td>
                                        <td>Head light</td>
                                        <td class="text-success"> 22.00% <i class="fa fa-arrow-up"></i></td>
                                        <td><label class="badge badge-success">Completed</label></td>
                                    </tr>
                                    <tr>
                                        <td>Ankit Dave</td>
                                        <td>Back light</td>
                                        <td class="text-success"> 28.05% <i class="fa fa-arrow-up"></i></td>
                                        <td><label class="badge badge-warning">In progress</label></td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
