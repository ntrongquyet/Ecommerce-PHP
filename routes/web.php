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
// Trang chủ
Route::get('/', 'PageController@index');
// Đăng kí
Route::get('Register','RegisterController@register');
Route::post('Register','RegisterController@insertAccount');

//Đăng nhập
Route::get('login','LoginController@login');
Route::post('login','LoginController@loginValid');
// Đăng xuất
Route::get('Logout',function(){
    session()->forget('user');
    return redirect('/');
});
// Active Mail
Route::get('active','ActiveMail@accountActive');
Route::get('Active',function(){
    return view('Users.Active');
});
// Profile
Route::get('profile/{username}',function(){
    return view('Users.Profile');
})->middleware('CheckValidLogin');
// Chi tiết đơn hàng
Route::get("/{idCat}/{idProduct}",'PageController@chitietsanpham');

// tìm kiếm sản phẩm
Route::get('default','PageController@SearchProduct');
Route::post('default','PageController@SearchProduct');

//Trang admin
Route::get('Admin',function(){
    return view('Admin.AdminPage');
});

//Comment
// Route::post('comment/{id}','CommentController@postComment');

//Quên mật khẩu
Route::get('Forgot', 'ForgotController@forgot');
Route::post('Forgot','ForgotController@forgotPassword');

// Thêm sản phẩm
Route::get('AddProduct','PageController@insertProduct')->middleware('RoleCheck');
Route::post('AddProduct','PageController@insertProductToDB')->middleware('RoleCheck');

Route::get("product/addToCart/{idProduct}",'PageController@themgiohang');
Route::get('product/view/cart','PageController@cart');

