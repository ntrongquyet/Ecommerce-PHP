<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ForgotController extends Controller
{
    public function forgot(Request $res)
    {
        $email = $res->cookie('email');
        return view('Users.Forgot');
    }

    public function forgotPassword(Request $request)
    {
        $rule = [
            'email' => 'required|email|min:6|max:32',
        ];
        $customMessage = [
            // Email
            'email.required' => ':attribute không được để trống',
            'email.min' => ':attribute tối thiểu 4 kí tự',
            'email.max' => ':attribute tối đa 32 kí tự',
            'email.email' => ':attribute không đúng định dạng',
        ];

        $validator = Validator::make($request->input(),$rule,$customMessage);
        if ($validator->fails()){
			return redirect('Forgot')
			->withInput()
			->withErrors($validator);
		}else{
            $data = $request->input();

            $email = DB::table('users')->select('email')
                    ->Where('email', '=', $data['email'])
                    ->get()->first();
            if($email !== null)
            {
                try{
                    $newPassword = strtoupper(bin2hex(random_bytes(4)));
                    $details = [
                        'title' => "Mật khẩu mới của bạn",
                        'newpassword' => "$newPassword"
                    ];
    
                    \Mail::to($data['email'])->send(new \App\Mail\MyTestMail($details));
    
                    //lưu mật khẩu mới vào database
                    $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    DB::table('users')
                    ->where('email', $data['email'])
                    ->update(['password' => $hashPassword]);
    
                    return redirect('Forgot')->with('status',"Mã khôi phục đã được gửi đến {$data['email']}");
    
                }catch(Exception $e){
                    return redirect('Forgot')->with('failed',"operation failed");
                }
            }
            else
            {
                return redirect('Forgot')->with('status',"$email->email chưa đăng ký tài khoản");
            }
        }
    }
}