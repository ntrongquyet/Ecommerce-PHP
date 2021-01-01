<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class PageController extends Controller
{
    private $limit = 9;
    public function index()
    {
        $categories = DB::table('Categories')->get();

        $topSaleProduct = DB::table('Products')
                            ->orderBy('id_product', 'desc')
                            ->take(5)
                            ->get();
        
        $topNewProduct = DB::table('Products')
                            ->orderBy('id_product', 'desc')
                            ->take(10)
                            ->get();

        $products = DB::table('Products')->paginate($this->limit);

        return view('index', [
            'categoryList' => $categories,
            'productList' =>  $products,
            'topSaleProduct' => $topSaleProduct
        ]);
    }
    public function chitietsanpham($idCat, $idProduct)
    {
        // Lấy chi tiết sản phẩm
        $product = DB::table('Products')
            ->where('id_product', '=', $idProduct)
            ->where('id_Cat', '=', $idCat)
            ->get()->first();
        // Lấy một vài sản phẩm cùng loại
        $cat = DB::table('Products')
            ->where('id_Cat', '=', $idCat)
            ->take(10)->get();
        return view("frontend.Products.product", [
            'product' => $product,
            'listProductAsCat' => $cat
        ]);
    }

    // chuyển đổi tiếng việt có dấu sang không dấu
    public function vn_to_str($str)
    {
        $unicode = array(

            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

            'd' => 'đ',

            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

            'i' => 'í|ì|ỉ|ĩ|ị',

            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'D' => 'Đ',

            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );

        foreach ($unicode as $nonUnicode => $uni) {

            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }

        return $str;
    }

    public function SearchProduct(Request $res)
    {
        $keyword = $res->input('keyword');

        if ($keyword == null) {
            $keyword = '#';
        }
        $listProduct = array();

        //lấy tất cả các sản phẩm
        $products = DB::table('Products')->get();

        //duyệt qua tất cả các sản phẩm tìm tên có chứa keyword
        for ($i = 0; $i < count($products); $i++) {
            $pos = strpos(strtoupper($this->vn_to_str($products[$i]->name)), strtoupper($this->vn_to_str($keyword)));
            if ($pos !== false) {
                $listProduct[$i] = $products[$i];
            }
        }
        return view("frontend.Products.search", ['listProduct' => $listProduct]);
    }

    // public function CalculatePagingInfo_search($currentPage)
    // {
    //     $totalProduct = count($products);

    //     $totalPage = ceil($totalProduct / $this->limit);

    //     if($currentPage > $totalPage)
    //     {
    //         $currentPage = $totalPage;
    //     }
    //     else if($currentPage < 1)
    //     {
    //         $currentPage = 1;
    //     }

    //     $start = ($currentPage - 1) * $this->limit;

    //     $result = DB::table('Products')
    //     ->skip($start)
    //     ->take($this->limit)
    //     ->get();

    //     return view('index',[
    //         'categoryList' => $categories,
    //         'productList' =>  $products,
    //         'topSaleProduct' => $topSaleProduct
    //     ]);
    // }
    public function insertProduct()
    {
        $categories = DB::table('Categories')->get();
        $msg = "";
        return view('frontend.Products.addProduct', [
            'categoryList' => $categories
        ])->with('msg',"$msg");
    }
    public function insertProductToDB(Request $res)
    {

        $data = $res->input();
        $images = array();
        $rule = [
            'name' => 'required',
            'price' => 'required',
            'about' => 'required',
            'qty' => 'required',
            'images' => 'required|min:3'

        ];
        $customMessage = [
            // Tên sản phẩm
            'name.required' => 'Tên sản phẩm không được để trống',
            // Giá
            'price.required' => 'Giá sản phẩm không được để trống',

            // Chi tiết
            'about.required' => 'Chi tiết sản phẩm không được để trống',
            // Sản phẩm
            'qty.required' => 'Số lượng sản phẩm không được để trống',
            // Hình ảnh
            'images.required' => 'Hình ảnh sản phẩm không được để trống',
            'images.min' => 'Hình ảnh tối thiểu phải là 3',
        ];
        $msg = '';
        $validator = Validator::make($res->all(), $rule, $customMessage);
        if ($validator->fails()) {
            return redirect('AddProduct')
                ->withInput()
                ->withErrors($validator);
        } else {
            if (count($res->file('images')) >= 3) {
                DB::table('Products')->insert([
                    'name' => $data['name'],
                    'id_Cat' => $data['cats'],
                    'quantity' => $data['qty'],
                    'description' => $data['about'],
                    'price' => $data['price'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $lastItem = DB::table('Products')->latest()->first();
                $id_Product = $lastItem->id_product;
                foreach ($res->file('images') as $img) {
                    // Cấp quyền lưu file

                    $name = uniqid('img_') . '.' . $img->getClientOriginalExtension();
                    $image_resize = Image::make($img->path())->resize(200,200);
                    $image_resize->save(public_path('/image/products/'.$name),80);
                    DB::table('Image')->insert([
                        'id_product' => $id_Product,
                        'image' => $name
                    ]);
                }
                // Cập nhật avatar mặc định cho sản phẩm
                $images = DB::table('Image')->where('id_product', '=', $id_Product)->get()->first();
                DB::table('Products')
                    ->where('id_product', $id_Product)
                    ->update(['avatar' => $images->image]);
                $msg = "Thêm sản phẩm thành công";
            } else {
                $msg = "Thêm sản phẩm thất bại, số lượng ảnh tối thiểu phải là 3";
            }
            $categories = DB::table('Categories')->get();
            return view('frontend.Products.addProduct', [
                'categoryList' => $categories
            ])->with('msg',"$msg");
        }
    }
}
