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
                <input type="checkbox" id="date" name="date" class="switch-input" />
                <label for="date" class="switch"></label>
                <label for="date" class="text-checkbox"></label>Theo ngày</label>
            </div>
            <div class="checkbox-option">
                <input type="checkbox" id="month" name="date" class="switch-input" />
                <label for="month" class="switch"></label>
                <label for="month" class="text-checkbox"></label>Theo tháng</label>
            </div>
            <div class="checkbox-option">
                <input type="checkbox" id="quarter" name="date" class="switch-input" />
                <label for="quarter" class="switch"></label>
                <label for="quarter" class="text-checkbox"></label>Theo quý</label>
            </div>
            <div class="checkbox-option">
                <input type="checkbox" id="year" name="date" class="switch-input" />
                <label for="year" class="switch"></label>
                <label for="year" class="text-checkbox"></label>Theo năm</label>
            </div>

            <div class="my-datepicker chose-date col-sm-3" id="input-day" hidden="true">
                <input id="datepicker" name="day" class="my-background" />

            </div>
            <div class="chose-month" id="input-month" hidden="true">

                <div class="col-sm-3">
                    <select class="form-control my-background" id="selectMonth">
                        <option selected>Chọn tháng</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>

                <div class="col-sm-3">
                    <input type="number" name="m-year" class="form-control my-background" id="enterYearOfMonth"
                        placeholder="Nhập năm" min="1900">
                </div>

            </div>

            <div class="chose-quarter" id="input-quarter" hidden="true">
                <div class="col-sm-3">
                    <select class="form-control my-background" id="selectQuarter">
                        <option selected>Chọn quý</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="number" name="q-year" class="form-control my-background" id="enterYearOfQuarter"
                        placeholder="Nhập năm" min="1900">
                </div>
            </div>

            <div class="chose-year" id="input-year" hidden="true">
                <div class="col-sm-3">
                    <input type="number" name="y-year" class="form-control my-background" id="enterYearOfYear"
                        placeholder="Nhập năm" min="1900">
                </div>
            </div>
        </div>
        <div class="btn-statisic">
            <a class="btn btn-secondary my-background" href="#" role="button" id="tk">Thống kê</a>
        </div>

        <table>
        </table>
    </div>

</div>

<script>
$(document).ready(function() {
    let id;
    let checked;
    $("input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);

            id = $box.attr("id");
            //show ra các input dựa theo id
            show(id);
            checked = true;
        } else {
            $box.prop("checked", false);
            Hidden();
            checked = false;
        }
    })

    $('#tk').click(function() {
        let url;
        let day;
        let month;
        let year;
        let quarter;
        if (checked) {
            if (id == "date") {

                day = $("input[name='day']").val();
                url = "{{ route('ajax.revenueDay') }}";

            } else if (id == "month") {
                month = $("#selectMonth").val();
                year = $("input[name='m-year']").val();

                url = "{{ route('ajax.revenueMonth') }}";
            } else if (id == "quarter") {
                quarter = $("#selectQuarter").val();
                year = $("input[name='q-year']").val();
                url = "{{ route('ajax.revenueQuarter') }}";
            } else if (id == "year") {
                year = $("input[name='y-year']").val();
                url = "{{ route('ajax.revenueYear') }}";
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    day: day,
                    month: month,
                    year: year,
                    quarter: quarter
                },
                success: function(response) {

                    for (let i = 0; i < response.product.length; i++) {
                        $("table").append("<li>"+i+"</li>");
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            });
        }
    });
});

function show(id) {
    if (id == "date") {
        Hidden();
        document.getElementById("input-day").hidden = false;
    } else if (id == "month") {
        Hidden();
        document.getElementById("input-month").hidden = false;
    } else if (id == "quarter") {
        Hidden();
        document.getElementById("input-quarter").hidden = false;
    } else if (id == "year") {
        Hidden();
        document.getElementById("input-year").hidden = false;
    }
}

function Hidden() {
    document.getElementById("input-day").hidden = true;
    document.getElementById("input-month").hidden = true;
    document.getElementById("input-quarter").hidden = true;
    document.getElementById("input-year").hidden = true;
}
$('#datepicker').datepicker({
    format: 'dd/mm/yyyy',
    uiLibrary: 'bootstrap4'
});
</script>
</div>

@endsection