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
// 404
Route::get('404', function(){
    return view('layouts.error');
});

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
Route::get('profile/{username}','PageController@profile')->middleware('CheckValidLogin');
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
Route::post('product','CommentController@postComment');

//Quên mật khẩu
Route::get('Forgot', 'ForgotController@forgot');
Route::post('Forgot','ForgotController@forgotPassword');

// Thêm sản phẩm
Route::get('AddProduct','PageController@insertProduct')->middleware('RoleCheck');
Route::post('AddProduct','PageController@insertProductToDB')->middleware('RoleCheck');
// Giỏ hàng
Route::get("product/addToCart/{idProduct}",'PageController@themgiohang')->middleware('Logged');
Route::get('product/view/cart','PageController@cart')->middleware('Logged');
Route::get('product/xoa-san-pham/{id}','PageController@xoasanpham')->middleware('Logged');
Route::get('product/giam-san-pham/{id}','PageController@giamsanpham')->middleware('Logged');
Route::get('product/tang-san-pham/{id}','PageController@tangsanpham')->middleware('Logged');
// Đặt hàng
Route::get('product/cart/checkout','PageController@chitietdathang')->middleware('Logged');
Route::post('product/cart/checkout','PageController@thanhtoan')->middleware('Logged');

//like sản phẩm
Route::get("product/liked/{idProduct}",'PageController@likeProduct')->middleware('Logged');

// Bình luận sản phẩm
Route::get('product/comment/{id}','PageController@comment');
Route::post("product/comment/{id}","PageController@comment");
