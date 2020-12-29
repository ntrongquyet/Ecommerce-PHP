<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private $limit = 3;
    public function index(){

        $categories = DB::table('Categories')->get();

        $topSaleProduct = DB::table('Products')->get();

        $products = DB::table('Products')->paginate($this->limit);

        // $totalProduct = count($products);

        // $totalPage = ceil($totalProduct / $this->limit);

        // $result = DB::table('Products')
        // ->skip(0)
        // ->take($this->limit)
        // ->get();

        return view('index',[
            'categoryList' => $categories,
            'productList' =>  $products,
            'topSaleProduct' => $topSaleProduct
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

    // chuyển đổi tiếng việt có dấu sang không dấu
    public function vn_to_str ($str)
    {
 
        $unicode = array(
         
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
         
        'd'=>'đ',
         
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
         
        'i'=>'í|ì|ỉ|ĩ|ị',
         
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
         
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
         
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
         
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
         
        'D'=>'Đ',
         
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
         
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
         
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
         
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
         
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
         
        );
         
        foreach($unicode as $nonUnicode=>$uni){
         
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
         
        }
         
        return $str;
         
    }

    public function SearchProduct(Request $res)
    {
        $keyword = $res->input('keyword');

        if($keyword == null)
        {
            $keyword = '#';
        }
        $listProduct = array();

        //lấy tất cả các sản phẩm
        $products = DB::table('Products')->get();

        //duyệt qua tất cả các sản phẩm tìm tên có chứa keyword
        for($i = 0; $i < count($products); $i++)
        {
            $pos = strpos(strtoupper($this->vn_to_str($products[$i]->name)), strtoupper($this->vn_to_str($keyword)));
            if($pos !== false)
            {
                $listProduct[$i] = $products[$i];
            }
        }
        return view("frontend.Products.search", ['listProduct' => $listProduct]);
    }

    public function CalculatePagingInfo($currentPage)
    {
        $categories = DB::table('Categories')->get();
        $topSaleProduct = DB::table('Products')->get();
        $products = DB::table('Products')->paginate($this->limit);

        // $totalProduct = count($products);

        // $totalPage = ceil($totalProduct / $this->limit);

        // if($currentPage > $totalPage)
        // {
        //     $currentPage = $totalPage;
        // }
        // else if($currentPage < 1)
        // {
        //     $currentPage = 1;
        // }

        // $start = ($currentPage - 1) * $this->limit;

        // $result = DB::table('Products')
        // ->skip($start)
        // ->take($this->limit)
        // ->get();

        return view('index',[
            'categoryList' => $categories,
            'productList' =>  $products,
            'topSaleProduct' => $topSaleProduct
        ]);
    }
}
