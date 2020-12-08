<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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

        $rule = [
            'username' => 'unique:users|required|string|min:4|max:32',
            'email' => 'unique:users|required|email|min:6|max:32',
            'pwd' => 'required|string|min:4|max:32',
            'pwd_confirm' => 'required|string|min:4|max:255|required_with:pwd|same:pwd',

        ];
        $customMessage = [
            // Username
            'username.required' => ':attribute không được để trống',
            'username.unique' => ':attribute đã tồn tại',
            'username.min' => ':attribute tối thiểu 4 kí tự',
            'username.max' => ':attribute tối đa 32 kí tự',
            // Email
            'email.required' => ':attribute không được để trống',
            'email.unique' => ':attribute đã tồn tại',
            'email.min' => ':attribute tối thiểu 4 kí tự',
            'email.max' => ':attribute tối đa 32 kí tự',
            'email.email' => ':attribute không đúng định dạng',
            // Mật khẩu
            'pwd.required' => ':attribute không được để trống',
            'pwd.min' => ':attribute tối thiểu 4 kí tự',
            'pwd.max' => ':attribute tối đa 32 kí tự',
            // Mật khẩu xác nhận
            'pwd_confirm.required' => ':attribute không được để trống',
            'pwd_confirm.min' => ':attribute tối thiểu 4 kí tự',
            'pwd_confirm.max' => ':attribute tối đa 32 kí tự',
            'pwd_confirm.required_with' => ':attribute không khớp',
            'pwd_confirm.same' => ':attribute không khớp',
        ];
        $validator = Validator::make($request->all(),$rule,$customMessage);
        if ($validator->fails()) {
			return redirect('Register')
			->withInput()
			->withErrors($validator);
		}else{
            $data = $request->input();
                try{
                    $user = new User;
                    $user->username = $data['username'];
                    $user->password = password_hash($data['pwd'],PASSWORD_DEFAULT);
                    $user->email = $data['email'];
                    $user->save();
                    return redirect('Register')->with('status',"Đăng kí thành công {$user->username}");

                }catch(Exception $e){
                    return redirect('Register')->with('failed',"operation failed");
                }
        }
        // $username = $request->input('username');
        // $email = $request->input('email');
        // $password = $request->input('pwd');
        // $pwd_confirm = $request->input('pwd_confirm');
        // $minutes = 30;
        // $username_cookie = cookie('username',$username,$minutes);
        // $email_cookie = cookie('email',$email,$minutes);
        // $success = ['msg' => "Đăng kí thành công tài khoản $username"];
        // return response()->view('Users.Register',$success,200)
        //                 ->withCookie('$username_cookie')
        //                 ->withCookie('$email_cookie');

    }
}
