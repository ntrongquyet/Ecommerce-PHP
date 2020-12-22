<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $products = DB::table('Products')->get();
        $categories = DB::table('Categories')->get();
        return view('index',[
            'categoryList' => $categories,
            'productList' => $products
        ]);
    }
}
