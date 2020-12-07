<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('register', function () {
    if(View::exists('register')){
        return view('register');
    }else{
        return 'Trang liên hệ đang bị lỗi vui lòng quay lại sau';
    }
});
Route::get('/hello-world/{name}',function ($name=null) {

    return view('hello-world')->with('name',$name);
})->middleware('checkAge');
Route::get('/role',[
    'middleware' => 'role:superadmin',
    'uses' => 'MainController@checkRole',
 ]);
Route::get('/test/{role}','MainController@uriTest');

Route::get('/tin-tuc/{news_id_string}','MainController@showNews');

Route::get('Register','RegisterController@register');
Route::post('Register','RegisterController@insertAccount');

Route::get('index1',function(){
    return view('frontend.first_blade_example');
});
