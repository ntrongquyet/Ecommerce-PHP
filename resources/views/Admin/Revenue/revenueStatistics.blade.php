@extends('Admin.AdminPage')
@section('admin-content')

    <div class="user-control">
        <nav class="nav-admin">
            <div class="admin-nav">
                <div class="admin-nav--item grid-item--left">
                    <div class="content-item-left">
                        <i class="far fa-list-alt "></i>
                        <div class="text-header"> THỐNG KÊ DOANH THU</div>
                    </div>
                </div>

                <div class="admin-nav--item grid-item--right">
                    <div class="content-item-right">
                        <i class="fas fa-download "></i>
                    </div>
                </div>
            </div>
        </nav>


        <div class="content-usercontrol">
            <div class="uc-content">
                <div class="header-option">
                    Tiêu chí thống kê
                </div>

                <div class="checkbox-option">
                    <input type="checkbox" id="date" class="switch-input" />
                    <label for="date" class="switch"></label>
                    <label for="date" class="text-checkbox"></label>Theo ngày</label>
                </div>
                <div class="checkbox-option">
                    <input type="checkbox" id="month" class="switch-input" />
                    <label for="month" class="switch"></label>
                    <label for="month" class="text-checkbox"></label>Theo tháng</label>
                </div>
                <div class="checkbox-option">
                    <input type="checkbox" id="quarter" class="switch-input" />
                    <label for="quarter" class="switch"></label>
                    <label for="quarter" class="text-checkbox"></label>Theo quý</label>
                </div>
                <div class="checkbox-option">
                    <input type="checkbox" id="year" class="switch-input" />
                    <label for="year" class="switch"></label>
                    <label for="year" class="text-checkbox"></label>Theo năm</label>
                </div>

            </div>
        </div>

        <script>

        </script>
    </div>

@endsection
