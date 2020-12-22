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
    public function chitietsanpham($idCat,$idProduct) {
        // Lấy chi tiết sản phẩm
        $product = DB::table('Products')
        ->where('id_product','=',$idProduct)
        ->where('id_Cat','=',$idCat)
        ->get()->first();
        // Lấy một vài sản phẩm cùng loại
        $cat = DB::table('Products')
        ->where('id_Cat','=',$idCat)
        ->take(10)->get();
        return view("frontend.Products.product",[
            'product' => $product,
            'listProductAsCat' => $cat
        ]);
    }
}
