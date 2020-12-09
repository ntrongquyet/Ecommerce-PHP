<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COCO Chat</title>
    <!-- <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/base.css"> -->
    <style>
        :root {
            --primary-color: #DC3545;
            --blackblue-color: #07689F;
            --secondblue-color: #40A8C4;
            --thirtblue-color: #A2D5F2;
            --primary-gray-color: #e8e8e8;
            --bg-body-color: #f0f2f5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            user-select: none;
            background: var(--bg-body-color);
        }

        a,
        a:hover {
            text-decoration: none!important;
        }

        li {
            list-style: none;
        }

        .bg-body {
            background: var(--bg-body-color);
        }

        .textarea {
            display: block;
            overflow: hidden;
            height: auto;
            min-height: 40px;
            line-height: 20px;
            border: 1px solid #ccc;
            font-family: inherit;
            font-size: inherit;
        }

        input[type=file],

        /* FF, IE7+, chrome (except button) */

        input[type=file]::-webkit-file-upload-button {
            /* chromes and blink button */
            cursor: pointer;
        }
        #main-logo{
            height: 60px !important;
            width: 60px !important;
            margin-left:47px;
        }
        .login__bg {
            height: 100vh;
            width: 100vw;
            background-color: var(--primary-color);
        }

        .login__bg--child {
            height: 100%;
            width: 50%;
            background-color: var(--blackblue-color);
        }

        .box-login {
            position: absolute;
            display: block;
            z-index: 10;
            background: white;
            width: 50%;
            height: 80%;
            position: absolute;
            left: 25%;
            top: 10%;
            border-radius: 5px;
        }

        .box-login #main-logo {
            margin-top: 20px;
            position: absolute;
            width: 150px;
            left: calc(50% - 75px);
        }

        .box-login .form-login {
            position: absolute;
            top: 70px;
            padding: 0px 60px;
            width: 100%;
        }

        .form-login h1 {
            font-size: 25px;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .form-login p {
            font-size: 14px;
            color: var(--blackblue-color);
            margin-bottom: 5px;
        }

        .usr-pass {
            height: 30px;
            width: 100%;
            margin-bottom: 10px;
            border-radius: 10px;
            border: 1px solid var(--blackblue-color);
            padding-left: 10px;
            color: var(--blackblue-color);
        }

        .usr-pass:hover {
            border: 2px solid var(--blackblue-color);
        }

        ::placeholder {
            font-size: 10px;
            font-style: italic;
            opacity: .3;
            color: var(--blackblue-color);
        }

        .form-login #keep-me {
            color: var(--blackblue-color);
            font-size: 14px;
            margin-left: 3px;
            position: absolute;
        }

        .form-login #forgot-password {
            float: right;
            text-decoration-line: none;
            color: var(--blackblue-color);
            font-size: 14px;
        }

        #forgot-password:hover {
            text-decoration-line: underline;
        }

        .form-login input[type="submit"] {
            width: 100%;
            margin: 15px 0;
            height: 30px;
            border: none;
            background-color: var(--primary-color);
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        .form-login input[type="submit"]:hover {
            border: 2px solid #fcb400;
        }

        .form-login input[type="submit"]:active {
            background-color: var(--blackblue-color);
            border: 2px solid var(--blackblue-color);
        }

        .form-login a {
            text-decoration-line: none;
            color: var(--blackblue-color);
        }

        #create-account a {
            font-weight: bold;
        }

        .form-login a:hover {
            text-decoration-line: underline;
        }

        #box-checkbox {
            display: block;
            position: absolute;
            width: 100%;
        }

        .form-login .input-value {
            outline: none;
            border-radius: 5px;
        }

        .break-box {
            display: block;
            position: relative;
            width: 100%;
            opacity: .3;
        }

        .break-box .content {
            text-align: center;
            font-size: 12px;
        }

        .break-box::before,
        .break-box::after {
            content: "";
            display: block;
            width: 35%;
            height: 1px;
            background: black;
            position: absolute;
            top: 50%;
            opacity: .3;
        }

        .break-box::before {
            left: 0;
        }

        .break-box::after {
            right: 0;
        }

        .login-with-google {
            display: block;
            margin-top: 20px;
            position: relative;
            border: 1px solid var(--blackblue-color);
            padding: 10px 0px;
            text-align: center;
            border-radius: 5px;
        }

        .login-with-google img {
            display: block;
            position: absolute;
            left: 20px;
            top: 10px;
            height: 20px;
            width: 20px;
            margin: 0;
        }

        .login-with-google span {
            color: var(--blackblue-color);
        }

        .login-with-google:hover {
            border: 2px solid var(--blackblue-color);
        }

        .login-with-google a:hover {
            text-decoration: none;
        }


        /* ==================== HOME PAGE  ===================== */

        #header {
            z-index: 99999;
            position: fixed;
            top: 0;
            left: 0;
            padding: 0.8rem 0;
            width: 100%;
            background: #fff;
            box-shadow: 0 0 13px 1px #5350509c;
        }

        img.header__logo--img {
            width: 80%;
            margin-left: 10%;
        }

        .header__search {
            width: 100%;
            position: relative;
        }

        .header__search--input {
            padding: 0.6rem 2.2rem 0.6rem 1rem;
            width: 100%;
            border: 1px solid #E8E8E8;
            border-radius: 20px;
            outline: none;
            transition: 0.4s;
        }

        .header__search--input,
        .header__search--input::placeholder {
            font-size: 1rem;
        }

        .header__search--input:hover,
        .header__search--input:focus {
            border-color: var(--blackblue-color);
        }

        .header__search>i {
            cursor: pointer;
            position: absolute;
            top: 25%;
            right: 0.8rem;
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-gray-color);
        }

        .header__nav .nav-app {
            display: flex;
            align-items: center;
            width: 90%;
        }

        .header__nav .header__nav--item {
            font-size: 1.6rem;
            color: var(--primary-gray-color);
            margin-right: 6%;
            transition: 0.4s;
        }

        .header__nav--item.active,
        .header__nav .header__nav--item:hover {
            color: var(--blackblue-color);
        }

        .header__nav .nav__user--img {
            width: 1.9rem;
            border: 2px solid var(--primary-color);
            border-radius: 50%;
        }

        .header__nav .nav__user--name {
            font-weight: 600;
            color: #616166;
        }


        /*====================== CONTENT AREA =================*/

        #content {
            position: relative;
            margin-top: 4.43rem;
        }

        .content__newfeeds {
            padding: 1rem 1rem 0;
        }

        .newfeed__item {
            position: relative;
            width: 100%;
            padding: 1.5rem;
            background: var(--white);
            margin-bottom: 0.5rem;
            border-radius: 10px;
            box-shadow: 0 0 9px 1px #6e6a6a8c;
        }

        .newfeed__item--more {
            position: absolute;
            right: 0;
            padding-right: 10px;
            font-size: 1.3rem;
            transform: translate(-50%, -15%);
        }

        .content__newfeeds .newfeed--avatar--img {
            width: 2.8rem;
            height: 2.8rem;
            border: 2px solid var(--primary-color);
            border-radius: 50%;
        }

        .newfeed__post--input {
            flex: 1;
            padding-right: 3%;
            margin-left: 1.2rem;
            border: none;
            outline: none;
        }

        .newfeed__post--input:empty::before {
            content: "Hello Jonny, how are you today?";
        }

        .newfeed__post--attachment-selector {
            display: flex;
            margin: 0;
        }

        .newfeed__post--attachment-item a {
            position: relative;
            font-size: 2rem;
            margin-right: 1.5rem;
            color: var(--primary-gray-color);
            transition: 0.4s;
        }

        .newfeed__post--attachment-item.active>a,
        .newfeed__post--attachment-item a i:hover a {
            color: var(--blackblue-color);
        }

        .newfeed__post--attachment-item input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
        }

        .newfeed__post .btn-post {
            border: 2px solid var(--blackblue-color);
            color: var(--blackblue-color);
            font-weight: bold;
            padding: 0.2rem 1.5rem;
            border-radius: 20px;
            transition: all 0.4s;
        }

        .newfeed__post .btn-post:hover {
            background-color: var(--blackblue-color);
            color: var(--white);
        }

        .newfeed__item--info {
            position: relative;
            flex: 1;
            padding-left: 1rem;
            display: flex;
            flex-direction: column;
        }

        .newfeed__item--more {
            position: absolute;
            right: 0;
            font-size: 1.3rem;
            color: var(--primary-text-color);
            transform: translateY(-10%);
        }

        .newfeed__item--info .info--username {
            color: var(--blackblue-color);
            font-size: 1rem;
            font-weight: bold;
        }

        .newfeed__item--info .info--time,
        .newfeed__item--info .info--separator,
        .newfeed__item--info .info--privacy {
            font-size: 0.8rem;
            color: var(--primary-text-color);
        }

        .newfeed__item--info .info--separator {
            margin: 0 0.25rem;
        }

        .newfeed__item--caption {
            margin: 0.5rem 0 0;
        }

        .newfeed__item--media {
            margin: 1rem -1.5rem 0;
        }

        img.newfeed__item--img {
            width: 100%;
        }

        .newfeed__item--interactives {
            margin-top: 1rem;
        }

        .interactives__item {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 20%;
            padding: 0.5rem 0;
            border-radius: 20px;
            transition: 0.4s;
        }

        .interactives__item a:hover i {
            color: var(--black-color);
        }

        .interactives__item--icon:active .liked {
            opacity: 1;
            transform: scale(1);
        }

        .interactives__item--icon {
            color: var(--primary-gray-color);
        }

        .interactives__item--icon i {
            font-size: 2rem;
            transition: 0.4s;
        }

        .interactives__item--icon {
            margin-right: 0.5rem;
        }

        .interactives__item--icon .liked {
            margin-left: -13%;
            transition: all 0.4s;
        }

    </style>
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