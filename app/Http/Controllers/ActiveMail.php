<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class ActiveMail extends Controller
{
    public function accountActive(Request $res)
    {
        $username = $res->username;
        $hashCode = $res->hashCode;
        $user = DB::table('users')->select('username', 'password', 'email_verified_at')
            ->where('username', '=', $username)
            ->get()->first();
        if ($user->email_verified_at != null) {
            return redirect('Active')->with('status',"Tài khoản này đã kích hoạt");

        } else {
            $md5 = md5($user->password);
            if ($md5 == $hashCode) {
                $affected = DB::table('users')
                    ->where('username', $username)
                    ->update(['email_verified_at' => Carbon::now()]);
                    return redirect('Active')->with('status',"Kích hoạt tài khoản thành công");

                } else {
                return redirect('Active')->with('status',"Đường dẫn kích hoạt không chính xác.Vui lòng kiểm tra lại email");
            }
        }
    }
}
