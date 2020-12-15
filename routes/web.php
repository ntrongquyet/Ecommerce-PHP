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


Route::get('Register','RegisterController@register');
Route::post('Register','RegisterController@insertAccount');

Route::get('/',function(){
    return view('index');
});

Route::get('login', function(){
    return view('Users.Login');
});

Route::get('active','ActiveMail@accountActive');
Route::get('Active',function(){
    return view('Users.Active');
});
