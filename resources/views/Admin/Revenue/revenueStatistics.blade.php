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

            <div class="my-datepicker chose-date col-sm-3" id="ngay" hidden="true">
                    <input id="datepicker" class="my-background" />

                </div>

                <div class="chose-month" id="thang" hidden="true">

                    <div class="col-sm-3">
                        <select class="form-control my-background">
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
                        <input type="number" class="form-control my-background" id="enterYearOfMonth"
                            placeholder="Nhập năm" min="1900">
                    </div>

                </div>

                <div class="chose-quarter" id="quy" hidden="true">
                    <div class="col-sm-3">
                        <select class="form-control my-background">
                            <option selected>Chọn quý</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <input type="number" class="form-control my-background" id="enterYearOfQuarter"
                            placeholder="Nhập năm" min="1900">
                    </div>
                </div>

                <div class="chose-year" id="nam" hidden="true">
                    <div class="col-sm-3">
                        <input type="number" class="form-control my-background" id="enterYearOfYear" placeholder="Nhập năm"
                            min="1900">
                    </div>
                </div>
        </div>


        <div class="btn-statisic">
            <a class="btn btn-secondary my-background" href="#" role="button">Thống kê</a>
        </div>
    </div>

</div>

<script>
// the selector will match all input controls of type :checkbox
// and attach a click event handler
$(document).ready(function() {
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
            
            let id = $box.attr("id");
            show(id);
        } else {
            $box.prop("checked", false);
            Hidden();
        }
    });
});

        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy',
            uiLibrary: 'bootstrap4'
        });

        function show(id)
        {
            if(id == "date")
            {
                Hidden();
                document.getElementById("ngay").hidden=false;
            }
            else if(id == "month")
            {
                Hidden();
                document.getElementById("thang").hidden=false;
            }
            else if(id == "quarter")
            {
                Hidden();
                document.getElementById("quy").hidden=false;
            }
            else if(id == "year")
            {
                Hidden();
                document.getElementById("nam").hidden=false;
            }
        }

        function Hidden()
        {
            document.getElementById("ngay").hidden=true;
            document.getElementById("thang").hidden=true;
            document.getElementById("quy").hidden=true;
            document.getElementById("nam").hidden=true;
        }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</div>

@endsection