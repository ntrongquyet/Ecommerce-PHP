@extends('Admin.AdminPage')
@section ('admin-content')

<div class="user-control">
    <nav class="nav-admin">
        <div class="admin-nav">
            <div class="admin-nav--item grid-item--left">
                <div class="content-item-left">
                    <i class="far fa-list-alt "></i>
                    <div class="text-header"> THÊM NGƯỜI DÙNG MỚI</div>
                </div>
            </div>
        </div>
    </nav>
    <div class="my-form ">
    <form>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control my-background" id="inputEmail3">
        </div>
      </div>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control my-background" id="inputEmail3">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Mật khẩu</label>
          <div class="col-sm-10">
            <input type="password" class="form-control my-background" id="inputPassword3">
          </div>
        </div>
        <fieldset class="row mb-3">
          <legend class="col-form-label col-sm-2 pt-0">Quyền truy cập</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option1" checked>
              <label class="form-check-label" for="gridRadios2">
                Người dùng
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option2">
              <label class="form-check-label" for="gridRadios1">
                Quản trị viên
              </label>
            </div>
           
           
          </div>
        </fieldset>
        
        <button type="submit" class="btn btn-secondary">Sign in</button>
      </form>
    </div>
</div>

@endsection