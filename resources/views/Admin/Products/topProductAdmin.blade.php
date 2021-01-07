@extends('Admin.AdminPage')
@section ('admin-content')

<style>
    .container {
        padding: 2rem 0rem;
    }

    h4 {
        margin: 2rem 0rem 1rem;
    }

    .img-thumbnail {
        height: 70px !important;
    }

    .table-image td,
    .table-image th {
        vertical-align: middle;
    }

    .pagination>li>a:focus,
    .pagination>li>a:hover,
    .pagination>li>span:focus,
    .pagination>li>span:hover {
        z-index: 3;
        color: #fff !important;
        background-color: #2F323A !important;
        border-color: #fff !important;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff !important;
        background-color: #4CCEE8 !important;
        border-color: #949494 !important;
    }

    .page-link {
        color: #fff !important;
        background-color: #212529 !important;
        border-color: #6d6d6d !important;
    }

    .page-link:focus {
        box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25) !important;
    }


</style>

<div class="user-control">
    <nav class="nav-admin">
        <div class="admin-nav">
            <div class="admin-nav--item grid-item--left">
                <div class="content-item-left">
                    <i class="far fa-list-alt "></i>
                    <div class="text-header"> TOP 10 SẢN PHẨM BÁN CHẠY</div>
                </div>
            </div>
        </div>
    </nav>
    <div class="my-table">
        <table class="table table-image table-dark table-hover ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col head-img" style="text-align: center">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Tổng số lượng bán</th>
                    <th scope="col">Tổng doanh thu</th>
                    <th scope="col">Lượt mua</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listProducts as $item)
                    <tr>
                        <th scope="row">{{ $item->id_product }}</th>
                        <td class="w-25">
                            <img src="{{ url('/image/products') }}/{{ $item->avatar }}" class="img-fluid img-thumbnail"
                                alt="{{ $item->avatar }}">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td scope="row">{{ $item->total_quantity }}</td>
                        <td scope="row">{{ number_format($item->total_price , 0, '', '.') }} VNĐ</td>
                        <td>{{ $item->countBought }}</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row mt-2">
        <nav aria-label="Page navigation example pagination-secondary" style="margin: 0 auto">
            {{ $listProducts->links() }}
        </nav>
    </div>
</div>

@endsection