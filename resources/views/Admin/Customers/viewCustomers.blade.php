@extends('Admin.AdminPage')
@section('title', 'Người dùng')
@section('sidebar')
    @parent

@endsection
<style>
    .manipulation {
        z-index: 100 !important;
    }

    .delete {
        color: crimson !important;
        font-size: 30px !important;

    }

    .icon-delete {
        text-align: center;
    }

</style>
@section('admin-content')

    <div class="user-control">
        <nav class="nav-admin">
            <div class="admin-nav">
                <div class="admin-nav--item grid-item--left">
                    <div class="content-item-left">
                        <i class="far fa-list-alt "></i>
                        <div class="text-header"> DANH SÁCH CÁC TÀI KHOẢN</div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="my-table">
            <table class="table table-image table-dark table-hover" id="data">
                <thead>
                    <tr>
                        <th scope="col" class="font-weight-bold">Id</th>
                        <th scope="col" class="font-weight-bold">Username</th>
                        <th scope="col" class="font-weight-bold">Email</th>
                        <th scope="col" class="font-weight-bold">Ngày tạo</th>
                        <th scope="col" class="font-weight-bold">Quyền truy cập</th>
                        <th scope="col" class="font-weight-bold">Xóa người dùng</th>
                    </tr>
                <tbody>
                    @foreach ($listCustomer as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <select name="status" class="form-control my-background changeStatus">
                                    @if ($item->role == 1)
                                        <option selected="selected" value="1">Quản trị viên</option>
                                        <option value="-1">Người dùng</option>
                                    @else
                                        <option value="1">Quản trị viên</option>
                                        <option selected="selected" value="-1">Người dùng</option>
                                    @endif
                                </select>
                            </td>
                            <td class="icon-delete">
                                <a class="manipulation delete" href="{{ URL::to('/user/delete/'.$item->id.'/') }}" title="Xóa" data-toggle="tooltip"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
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
            //phân trang
            $('#data').after(
                '<div class="row mt-2"><nav id="pageginNum" aria-label="Page navigation example pagination-secondary" style="margin: 0 auto"><ul id="nav" class="pagination"></ul></div>'
            );
            var rowsShown = 8;
            var rowsTotal = $('#data tbody tr').length;
            var numPages = rowsTotal / rowsShown;
            if (numPages > 1) {

                for (i = 0; i < numPages; i++) {
                    var pageNum = i + 1;
                    $('#nav').append(
                        '<li class="page-item"><a class="page-link" rel="' +
                        i + '">' + pageNum + '</a></li> ');
                }
                $('#data tbody tr').hide();
                $('#data tbody tr').slice(0, rowsShown).show();
                $('#nav a:first').addClass('active');
                $('#nav a').bind('click', function() {
                    $('#nav a').removeClass('active');
                    $(this).addClass('active');
                    var currPage = $(this).attr('rel');
                    var startItem = currPage * rowsShown;
                    var endItem = startItem + rowsShown;
                    $('#data tbody tr').css('opacity', '0.0').hide().slice(
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
