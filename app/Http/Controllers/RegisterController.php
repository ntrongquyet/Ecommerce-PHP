<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $res)
    {
        $username = $res->cookie('username');
        $email = $res->cookie('email');
        return view('Users.Register')->with(['username'=>$username, 'email'=>$email]);
    }
    public function insertAccount(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('pwd');
        $pwd_confirm = $request->input('pwd_confirm');
        $minutes = 30;
        $username_cookie = cookie('username',$username,$minutes);
        $email_cookie = cookie('email',$email,$minutes);
        $success = ['msg' => "Đăng kí thành công tài khoản $username"];
        return response()->view('Users.Register',$success,200)
                        ->withCookie('$username_cookie')
                        ->withCookie('$email_cookie');

    }
}
