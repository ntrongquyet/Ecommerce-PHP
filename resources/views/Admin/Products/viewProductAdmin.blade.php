@extends('Admin.AdminPage')
@section('admin-content')

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

        .manipulation {
            z-index: 100 !important;
            font-size: 15px !important;
        }

        .add {
            color: #4CCEE8 !important;
        }

        .delete {
            color: crimson !important;
        }

        .edit {
            color: goldenrod !important;
        }

    </style>

    <div class="user-control">
        <nav class="nav-admin">
            <div class="admin-nav">
                <div class="admin-nav--item grid-item--left">
                    <div class="content-item-left">
                        <i class="far fa-list-alt "></i>
                        <div class="text-header"> DANH SÁCH CÁC LOẠI SẢN PHẨM</div>
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
                        <th scope="col">Tồn kho</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Lượt thích</th>
                        <th scope="col">Thao tác</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($listProducts as $item)
                        <tr>
                            <th scope="row">{{ $item->id_product }}</th>
                            <td class="w-25">
                                <img src="{{ url('/image/products') }}/{{ $item->avatar }}" class="img-fluid img-thumbnail"
                                    alt="Sheep">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 0, '', '.') }} VNĐ</td>
                            <td>{{ $item->liked }}</td>
                            <td>
                                <a class="manipulation add" href="#" title="Add" data-toggle="tooltip"><i
                                        class="fas fa-plus-circle"></i></a>
                                <a class="manipulation delete" href="#" title="Delete" data-toggle="tooltip"><i
                                        class="fas fa-minus-circle "></i></a>
                                <a class="manipulation edit" href="#" title="Edit" data-toggle="tooltip"><i
                                        class="fas fa-pen-square"></i></a>

                            </td>
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
