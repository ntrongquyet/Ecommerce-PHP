<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
use Cart;
use Darryldecode\Cart\Cart as CartCart;

class PageController extends Controller
{
    private $limit = 9;
    public function index()
    {
        $categories = DB::table('Categories')->get();

        //lấy 10 id_product có tổng số lượng lớn nhất trong PurchaseDetail
        $id_products = DB::table('PurchaseDetail')
            ->select('id_product', DB::raw('SUM(quantity) as total'))
            ->groupBy('id_product')
            ->orderBy('total', 'desc')
            ->take(10)
            ->get();


        $arr_id = array();

        //tạo mảng chứa các id_product
        for ($i = 0; $i < count($id_products); $i++) {
            $arr_id[$i] = $id_products[$i]->id_product;
        }

        // 10 sản phẩm bán chạy nhất
        $topSaleProduct = DB::table('Products')
            ->whereIn('id_product', $arr_id)
            ->take(10)
            ->get();

        // 10 sản phẩm mới nhất
        $topNewProduct = DB::table('Products')
            ->orderBy('id_product', 'desc')
            ->take(10)
            ->get();

        // 10 sản phẩm được yêu thích nhất nhất
        $topLikeProduct = DB::table('Products')
            ->orderBy('liked', 'desc')
            ->take(10)
            ->get();

        // phân trang
        $products = DB::table('Products')->paginate($this->limit);

        return view('index', [
            'categoryList' => $categories,
            'productList' =>  $products,
            'topSaleProduct' => $topSaleProduct,
            'topNewProduct' => $topNewProduct,
            'topLikeProduct' => $topLikeProduct
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
            //Lấy chi tiết hình ảnh
        $imageDetail = DB::table('Image')
        ->where('id_product', '=', $idProduct)
        ->get();
        return view("frontend.Products.detailProduct", [
            'product' => $product,
            'listProductAsCat' => $cat,
            'imageDetail' => $imageDetail
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

        if ($keyword == null)
        {
            if(session('keyword') != '#')
            {
                $keyword = session('keyword');
            }
            else
            {
                $keyword = '#';
            }
            
        }

        session()->put('keyword', $keyword);
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
        ])->with('msg', "$msg");
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
                    $image_resize = Image::make($img->path())->resize(200, 200);
                    $image_resize->save(public_path('/image/products/' . $name), 80);
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
            ])->with('msg', "$msg");
        }
    }

    public function cart()
    {
        $items = \Cart::getContent();
        $total = \Cart::getTotal();
        return view('frontend.checkout.cart')->with([
            "list" => $items,
            'total_money' => $total
        ]);
    }

    public function themgiohang($idProduct)
    {
        $product = DB::table('Products')
            ->where('id_product', '=', $idProduct)
            ->get()->first();
        $msg = "Thêm sản phẩm thành công";
        $item = Cart::get($idProduct);
        if ($item != null && $item->quantity >= $product->quantity) {
            $msg = "Sản phẩm trong kho không đủ để thực hiện giao dịch";
        } else {
            Cart::add(array(
                'id'    => $idProduct,
                'name'  => $product->name,
                'price' => $product->price,
                'quantity'   => 1,
                'attributes' => [
                    'img' => $product->avatar,
                ]
            ));
        }
        return redirect()->back()->with('jsAlert', $msg);
    }
    public function xoasanpham($idProduct)
    {
        $remove = \Cart::remove($idProduct);
        return redirect()->back();
    }
    public function giamsanpham($idProduct)
    {

        $item = \Cart::get($idProduct);
        if ($item->quantity == 1) {
            $remove = \Cart::remove($idProduct);
        } else {
            Cart::update($idProduct, array(
                'quantity' => -1, // lấy số lượng hiện tại trong giỏ hàng trừ đi 1
            ));
        }
        return redirect()->back();
    }
    public function tangsanpham($idProduct)
    {
        $msg = "";
        $itemDB = DB::table("Products")->where("id_product", "=", $idProduct)->get()->first();


        $item = \Cart::get($idProduct);
        if ($item->quantity == $itemDB->quantity) {
            $msg = "Sản phẩm trong kho không đủ để thực hiện giao dịch";
            return redirect()->back()->with('jsAlert', $msg);
        } else {
            Cart::update($idProduct, array(
                'quantity' => +1, // lấy số lượng hiện tại trong giỏ hàng cộng thêm1

            ));
            return redirect()->back();
        }
    }
    public function chitietdathang()
    {
        $user  = DB::table('users')->where('username', '=', session()->get('user'))->get()->first();
        return view('frontend.checkout.checkout')->with('user', $user);
    }
    public function thanhtoan(Request $request)
    {
        $items = \Cart::getContent();
        if(Cart::isEmpty()){
            return redirect()->back()->with('thatbai','Giỏ hàng của bạn đang trống');
        }else{
            $data = $request->input();
            $this->validate(
                $request,
                [
                    'hoten'         => 'required',
                    'email'         => 'required|email',
                    'diachi'        => 'required',
                    'sodienthoai'   => 'required'

                ],
                [
                    'hoten.required'        => 'Bạn chưa điền tên',
                    'email.required'        => 'Bạn chưa điền email',
                    'diachi.required'       => 'Bạn chưa điền địa chỉ',
                    'sodienthoai.required'  => 'Bạn cần điền số điện thoại'
                ]
            );
            $total_money = floatval(preg_replace('/[^\d.]/', '', Cart::getSubTotal()));
            $status = 1;
            // Thanh toán qua zalopay
            if ($data['thanhtoan'] == 0) {
                $status = 0;
            }
            // Lấy thông tin khách hàng
            $user  = DB::table('users')->where('username', '=', session()->get('user'))->get()->first();
            // Tạo đơn hàng trong database
            DB::table('Purchases')->insert([
                'id_user' => $user->id,
                'total' => $total_money,
                'status' => 1,
                'note' => $data['ghichu'],
                'thanhtoan' => $status,
                'name' => $data['hoten'],
                'phone' => $data['sodienthoai'],
                'address' => $data['diachi'],
            ]);
            $lastItem = DB::table('Purchases')->latest()->first();
            $id_Purchase = $lastItem->id_purchase;
            // Lưu số thứ tự từng món hàng
            $stt = 1;
            foreach($items as $product){
                DB::table('PurchaseDetail')->insert([
                    'id_purchase' => $id_Purchase,
                    'id_detail' => $stt++,
                    'id_product' => $product->id,
                    'quantity' => $product->quantity,
                    'unit_price' => $product->price,
                ]);
                // Trừ số lượng sản phẩm trong kho
                DB::table('Products')
              ->where('id_product', '=',$product->id)
              ->decrement('quantity', $product->quantity);
            }
            Cart::clear();
            return redirect()->back()->with('thanhcong','Đặt hàng thành công');
        }

    }

    public function likeProduct($idProduct)
    {
        if(session()->get('user') != null)
        {
            // Lấy thông tin khách hàng
            $user  = DB::table('users')->where('username', '=', session()->get('user'))->get()->first();

            // tìm xem user đã like sản phẩm đó chưa
            $userLikeProduct = DB::table('UserLikeProduct')
                                ->where('user_id', '=', $user->id)
                                ->where('product_id', '=', $idProduct)
                                ->get()
                                ->first();

            if($userLikeProduct == null)
            {
                //insert
                DB::table('UserLikeProduct')->insert([
                    'user_id' => $user->id,
                    'product_id' => $idProduct,
                ]);

                // update cột liked tăng lên 1 giá trị
                DB::table('Products')
                ->where('id_product', '=',$idProduct)
                ->increment('liked');
            }
            else
            {
                //delete
                DB::table('UserLikeProduct')
                ->where('id', $userLikeProduct->id)
                ->delete();

                // update cột liked giảm 1 giá trị
                DB::table('Products')
                ->where('id_product', '=',$idProduct)
                ->decrement('liked');
            }
        }
        return redirect()->back();
    }
}