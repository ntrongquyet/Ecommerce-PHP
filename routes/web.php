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
    session()->forget('role');
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
Route::get('search','PageController@SearchProduct');

//Comment
Route::post('product','CommentController@postComment');

//Quên mật khẩu
Route::get('Forgot', 'ForgotController@forgot');
Route::post('Forgot','ForgotController@forgotPassword');

//reset password
Route::get('Reset','ActiveMail@resetAccount');
Route::get('ResetPassword','ForgotController@reset');
Route::post('ResetPassword','ForgotController@resetAccount');


// Thêm sản phẩm
Route::get('AddProduct','PageController@insertProduct')->middleware('RoleCheck');
Route::post('AddProduct','PageController@insertProductToDB')->middleware('RoleCheck');
// Giỏ hàng
Route::post("product/addToCart",'PageController@themgiohang')->middleware('Logged')->name('addToCart');
Route::get('product/view/cart','PageController@cart')->middleware('Logged');
Route::get('product/xoa-san-pham/{id}','PageController@xoasanpham')->middleware('Logged');
Route::post('product/giam-san-pham','PageController@giamsanpham')->middleware('Logged')->name('giamsanpham');
Route::post('product/tang-san-pham','PageController@tangsanpham')->middleware('Logged')->name('tangsanpham');
// Đặt hàng
Route::get('product/cart/checkout','PageController@chitietdathang')->middleware('Logged');
Route::post('product/cart/checkout','PageController@thanhtoan')->middleware('Logged');

//like sản phẩm
Route::post('ajax/likeProduct','PageController@likeProduct')->middleware('Logged')->name('ajax.likeProduct');

// Bình luận sản phẩm
Route::get('product/comment/{id}','PageController@comment');
Route::post("product/comment/{id}","PageController@comment");

//Trang admin
Route::get('Admin',function(){
    return view('Admin.indexAdmin');
});

//index adim
Route::get('/index-admin', 'AdminController@index_Admin');
// view customer admin
Route::get('/view-customer', 'AdminController@view_Customer');
// add customer admin
Route::get('/add-customer', 'AdminController@add_Customer');
// product admin
Route::get('/view-product', 'AdminController@view_Product');
//add product admin
Route::get('addProductAdmin', 'AdminController@add_ProductAdmin');
Route::post('addProductAdmin', 'AdminController@insertProductToDB');
// top 10 product admin
Route::get('/top-product', 'AdminController@top_Product');
// view purchase admin
// Route::get('/view-purchase', 'PageController@bill');
Route::get('/view-purchase', 'AdminController@view_Purchase');
//Thay đổi trạng thái đơn hàng
Route::post('ajax/changeStatus','PageController@changeStatus')->name('ajax.changeStatus');
// view purchase admin
Route::get('/filter-purchase', 'AdminController@filter_Purchase');
Route::get('/filter-purchase', 'AdminController@filter_Purchase');

// revenue statistic
Route::get('/revenue-statistic', 'AdminController@revenue_Statistic');

// revenue day
Route::post('ajax/revenueDay', 'AdminController@revenue_Day')->name('ajax.revenueDay');
// revenue month
Route::post('ajax/revenueMonth', 'AdminController@revenue_Month')->name('ajax.revenueMonth');
// revenue quarter
Route::post('ajax/revenueQuarter', 'AdminController@revenue_Quarter')->name('ajax.revenueQuarter');
// revenue year
Route::post('ajax/revenueYear', 'AdminController@revenue_Year')->name('ajax.revenueYear');

// edit sản phẩm

Route::get('/product/edit/{id}', 'PageController@getEdit')->name('editProduct')->middleware('RoleCheck');
Route::post('/product/edit/{id}', 'PageController@postEdit')->name('editProductDB')->middleware('RoleCheck');

// delete
Route::get('/product/remove/{id}', 'AdminController@remove')->name('removeProduct')->middleware('RoleCheck');
