<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <!-- boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   
    <link rel="stylesheet" href="style/base.css">
    <link rel="stylesheet" href="style/pc_style.css">

</head>

<body>
    <div class="login__bg">
        <div class="login__bg--child"></div>
    </div>
    <div class="box-login">
        <img src="https://upload.wikimedia.org/wikipedia/vi/archive/d/dc/20200125140746%21Vinfast-logo.png" id="main-logo" alt="logo_COCOChat">
        <form class="form-login">
            <h1>Login here</h1>
            <p>Username</p>
            <input type="text" class="input-value usr-pass" id="username" placeholder="Enter your username...">
            <p>Password</p>
            <input type="password" class="input-value usr-pass" id="password" placeholder="Enter your password...">
            <div class="" id="box-checkbox">
                <input type="checkbox" id="checkbox">
                <span id="keep-me">Keep me logged in</span>
            </div>
            <a href="#" id="forgot-password">Forgot password?</a>
            <input type="submit" class="input-value" id="submit" value="login">
            <p id="create-account">Don't have an account yet? <a href="./register.html">Sign up</a></p>
            <div class="break-box">
                <div class="content" style="text-transform:uppercase;margin-top:20px">Login an another</div>
            </div>
            <div class="login-with-google">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/1200px-Google_%22G%22_Logo.svg.png">
                <a>Login with Google</a>
            </div>
        </form>
        <script>
            document.getElementById("submit").addEventListener("click", onClickSubmit);
            document.getElementById("keep-me").addEventListener("click", onClickKeepMe);
            var checkbox = document.getElementById("checkbox");
            var password = document.getElementById("password");
            var username = document.getElementById("username");

            function onClickSubmit() {
                var usrPass = document.getElementsByClassName("usr-pass");
                usrPass[0].value = usrPass[1].value = '';
                checkbox.checked = false;
                if (username.value.toString() == 'admin' || password.value.toString() == 'admin') {
                    window.location.replace('http://toidicode.com');
                }
            }

            function onClickKeepMe() {
                if (!checkbox.checked) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            }
        </script>
    </div>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="/__/firebase/7.19.1/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="/__/firebase/7.19.1/firebase-analytics.js"></script>

    <!-- Initialize Firebase -->
    <script src="/__/firebase/init.js"></script>
</body>

</html>