<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    private $limit = 5;
    public function index_Admin()
    {
        return view('Admin.indexAdmin');
    }

    public function view_Product()
    {
        $listProducts = DB::table('Products')
        ->select('Products.*')
        ->paginate($this->limit);
        return view('Admin.Products.viewProductAdmin',[
            'listProducts' => $listProducts
        ]);
    } 

    public function top_Product()
    {
        $listProducts = DB::table('PurchaseDetail')
        ->join('Products', 'Products.id_product', '=', 'PurchaseDetail.id_product')
        ->select('PurchaseDetail.id_product','Products.name','Products.avatar', DB::raw('SUM(PurchaseDetail.quantity) as total_quantity'), DB::raw('SUM(PurchaseDetail.unit_price) as total_price'), DB::raw('count(*) as countBought'))
        ->groupBy('PurchaseDetail.id_product','Products.name','Products.avatar')
        ->orderBy('countBought', 'desc')
        ->take(10)
        ->paginate($this->limit);
        return view('Admin.Products.topProductAdmin',[
            'listProducts' => $listProducts
        ]);
    }

    public function view_Customer()
    {
        return view('Admin.Customers.viewCustomers');
    }

    public function add_Customer()
    {
        return view('Admin.Customers.addCustomer');
    }

    public function view_Purchase()
    {
        $listPurchases = DB::table('Purchases')
            ->join('users', 'Purchases.id_user', '=', 'users.id')
            ->join('Status', 'Status.id_stt', '=', 'status')
            ->orderBy('Purchases.created_at', 'asc')
            ->select('Purchases.*', 'Status.description')
            ->paginate($this->limit);
        $listStatus = DB::table('Status')->get();
        return view('Admin.Purchase.viewPurchase', [
            'listPurchases' => $listPurchases,
            'listStatus' => $listStatus
        ]);
    }

    public function filter_Purchase()
    {
        return view('Admin.Purchase.filterPurchase');
    }

    public function revenue_Statistic()
    {
        return view('Admin.Revenue.revenueStatistics');
    }

    public function revenue_Day(Request $res)
    {
        $day = $res->input('day');
        $statistics = DB::table('Purchases')
                        ->join('users', 'Purchases.id_user', '=', 'users.id')
                        ->select('Purchases.id_purchase', 'users.email', 'Purchases.address', 'Purchases.total', 'Purchases.created_at')
                        ->whereDate('Purchases.created_at', $day)
                        ->get();
        $total_price = DB::table('Purchases')
                ->select(DB::raw('SUM(total) as total_price'))
                ->whereDate('Purchases.created_at', $day)
                ->get();
        $total_purchase = DB::table('Purchases')
                        ->whereDate('Purchases.created_at', $day)
                        ->count();
        return response()->json(['statistics' => $statistics, 'total_price' => $total_price, 'total_purchase' => $total_purchase],200);
    }
    public function revenue_Month(Request $res)
    {
        $data = $res->input();
        $statistics = DB::table('Purchases')
                        ->join('users', 'Purchases.id_user', '=', 'users.id')
                        ->select('Purchases.id_purchase', 'users.email', 'Purchases.address', 'Purchases.total', 'Purchases.created_at')
                        ->whereMonth('Purchases.created_at', $data['month'])
                        ->whereYear('Purchases.created_at', $data['year'])
                        ->get();
        $total_price = DB::table('Purchases')
                ->select(DB::raw('SUM(total) as total_price'))
                ->whereMonth('Purchases.created_at', $data['month'])
                ->whereYear('Purchases.created_at', $data['year'])
                ->get();
        $total_purchase = DB::table('Purchases')
                        ->whereMonth('Purchases.created_at', $data['month'])
                        ->whereYear('Purchases.created_at', $data['year'])
                        ->count();
        return response()->json(['statistics' => $statistics, 'total_price' => $total_price, 'total_purchase' => $total_purchase],200);
    }

    public function revenue_Quarter(Request $res)
    {
        
    }
    
    public function revenue_Year(Request $res)
    {
        $year = $res->input('year');
        $statistics = DB::table('Purchases')
                        ->join('users', 'Purchases.id_user', '=', 'users.id')
                        ->select('Purchases.id_purchase', 'users.email', 'Purchases.address', 'Purchases.total', 'Purchases.created_at')
                        ->whereYear('Purchases.created_at', $year)
                        ->get();
        $total_price = DB::table('Purchases')
                ->select(DB::raw('SUM(total) as total_price'))
                ->whereYear('Purchases.created_at', $year)
                ->get();
        $total_purchase = DB::table('Purchases')
                        ->whereYear('Purchases.created_at', $year)
                        ->count();
        return response()->json(['statistics' => $statistics, 'total_price' => $total_price, 'total_purchase' => $total_purchase],200);
    }

}