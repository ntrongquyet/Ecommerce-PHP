<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white">
            <h3 style="text-align: center">Đăng ký</h3>
            <hr>
            <?php if (isset($msg)): ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>
            <form action="Register" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" name="username"<?php if(isset($username)) echo 'value = "' . $username . '"'?> class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="row">
                    <div class="col-12-md col-6">
                        <div class="form-group">
                            <label for="pwd">Mật khẩu</label>
                            <input type="password" name="pwd" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-12-md col-6">
                        <div class="form-group">
                            <label for="pwd_confirm">Nhập lại mật khẩu</label>
                            <input type="password" name="pwd_confirm" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Đăng kí</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a class="text-info" href="./Login"><span>Đã có tài khoản</span></a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
