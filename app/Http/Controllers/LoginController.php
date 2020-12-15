<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $res)
    {
        $data = $res->input();
        $user = DB::table('users')->select('username', 'password', 'email_verified_at')
            ->where('username', '=', $data['username'])
            ->get()->first();
        if ($user !== null) {
            if ($user->email_verified_at == null) {
                return redirect('login')->with('status', "Tài khoản chưa được kích hoạt");
            } else {
                if ($md5 == $hashCode) {

                    return redirect('Active')->with('status', "Kích hoạt tài khoản thành công");
                } else {
                    return redirect('Active')->with('status', "Đường dẫn kích hoạt không chính xác.Vui lòng kiểm tra lại email");
                }
            }
        }
    }
}
