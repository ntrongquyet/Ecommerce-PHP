@extends('Admin.AdminPage')
@section('admin-content')

    <style>
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
                        <div class="text-header"> DANH SÁCH CÁC ĐƠN HÀNG</div>
                    </div>
                </div>
            </div>
        </nav>


        @isset($success)

            <div class="alert alert-primary" role="alert">
                {{ $success }}
            </div>
        @endisset

        <div class="my-table">
            <table class="table table-dark table-hover ">
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
                    @foreach ($listPurchases as $item)
                        <tr id="{{ $item->id_purchase }}">
                            <td>{{ $item->id_purchase }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->total, 0, '', '.') }} VNĐ</td>
                            <td> {{ $item->created_at }}</td>
                            <td>
                                {{ csrf_field() }}
                                <div class="col-sm-10">
                                    <select name="status" class="form-control my-background">

                                        @foreach ($listStatus as $status)
                                            @if ($status->id_stt == $item->status)
                                                <option selected="selected" value="{{ $status->id_stt }}">
                                                    {{ $status->description }}
                                                </option>
                                            @else
                                                <option value="{{ $status->id_stt }}">{{ $status->description }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            {{-- <!-- <td><label class="badge {{ $item->status == '1' ? 'badge-secondary' : ($item->status == '2' ? 'badge-danger' : ($item->status == '3' ? 'badge-light' : ($item->status == '4' ? 'badge-warning' : 'badge-success'))) }}">{{ $item->description }}</label></td> --> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="row mt-2">
            <nav aria-label="Page navigation example pagination-secondary" style="margin: 0 auto">
                {{ $listPurchases->links() }}
            </nav>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.changeStatus').on('change', function() {
                    var id = $(this).closest('tr').attr('id');
                    var value = $(this).val();
                    console.log(id, value);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ route('ajax.changeStatus') }}",
                        data: {
                            id: id,
                            value: value
                        }
                    })

                })
            });

        </script>
    </div>

@endsection
