<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        return view('Users.Login');
    }
    public function loginValid(Request $res)
    {
        $data = $res->input();
        $user = DB::table('users')->select('username', 'password')
            ->where('username', '=', $data['username'])
            ->orWhere('email', '=', $data['username'])
            ->get()->first();
        if ($user !== null) {
            if (password_verify($data['pwd'], $user->password)) {
                session()->put('user', $user->username);
                return redirect('/');

            } else {
                $msg = "Mật khẩu đăng nhập không chính xác";
            }
        } else {
            $msg = "Tài khoản không tồn tại";
        }
        return redirect('login')->with('status',"$msg");

    }
}
