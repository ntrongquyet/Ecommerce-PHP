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
        ->get();
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
        ->get();
        return view('Admin.Products.topProductAdmin',[
            'listProducts' => $listProducts
        ]);
    }

    public function view_Customer()
    {
        $listCustomer = DB::table('users')->get();
        return view('Admin.Customers.viewCustomers',[
            'listCustomer' => $listCustomer
        ]);
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

    public function firstQuarter($year)
    {
        $statistics = DB::table('Purchases')
                        ->join('users', 'Purchases.id_user', '=', 'users.id')
                        ->select('Purchases.id_purchase', 'users.email', 'Purchases.address', 'Purchases.total', 'Purchases.created_at')
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '1')
                        ->orwhereMonth('Purchases.created_at', '2')
                        ->orwhereMonth('Purchases.created_at', '3')
                        ->get();
        $total_price = DB::table('Purchases')
                        ->select(DB::raw('SUM(total) as total_price'))
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '1')
                        ->orwhereMonth('Purchases.created_at', '2')
                        ->orwhereMonth('Purchases.created_at', '3')
                        ->get();
        $total_purchase = DB::table('Purchases')
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '1')
                        ->orwhereMonth('Purchases.created_at', '2')
                        ->orwhereMonth('Purchases.created_at', '3')
                        ->count();
        return ['statistics' => $statistics, 'total_price' => $total_price, 'total_purchase' => $total_purchase];
    }
    public function secondQuarter($year)
    {
        $statistics = DB::table('Purchases')
                        ->join('users', 'Purchases.id_user', '=', 'users.id')
                        ->select('Purchases.id_purchase', 'users.email', 'Purchases.address', 'Purchases.total', 'Purchases.created_at')
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '4')
                        ->orwhereMonth('Purchases.created_at', '5')
                        ->orwhereMonth('Purchases.created_at', '6')
                        ->get();
        $total_price = DB::table('Purchases')
                        ->select(DB::raw('SUM(total) as total_price'))
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '4')
                        ->orwhereMonth('Purchases.created_at', '5')
                        ->orwhereMonth('Purchases.created_at', '6')
                        ->get();
        $total_purchase = DB::table('Purchases')
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '4')
                        ->orwhereMonth('Purchases.created_at', '5')
                        ->orwhereMonth('Purchases.created_at', '6')
                        ->count();
        return ['statistics' => $statistics, 'total_price' => $total_price, 'total_purchase' => $total_purchase];
    }
    public function thirdQuarter($year)
    {
        $statistics = DB::table('Purchases')
                        ->join('users', 'Purchases.id_user', '=', 'users.id')
                        ->select('Purchases.id_purchase', 'users.email', 'Purchases.address', 'Purchases.total', 'Purchases.created_at')
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '7')
                        ->orwhereMonth('Purchases.created_at', '8')
                        ->orwhereMonth('Purchases.created_at', '9')
                        ->get();
        $total_price = DB::table('Purchases')
                        ->select(DB::raw('SUM(total) as total_price'))
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '7')
                        ->orwhereMonth('Purchases.created_at', '8')
                        ->orwhereMonth('Purchases.created_at', '9')
                        ->get();
        $total_purchase = DB::table('Purchases')
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '7')
                        ->orwhereMonth('Purchases.created_at', '8')
                        ->orwhereMonth('Purchases.created_at', '9')
                        ->count();
        return ['statistics' => $statistics, 'total_price' => $total_price, 'total_purchase' => $total_purchase];
    }
    public function fourthQuarter($year)
    {
        $statistics = DB::table('Purchases')
                        ->join('users', 'Purchases.id_user', '=', 'users.id')
                        ->select('Purchases.id_purchase', 'users.email', 'Purchases.address', 'Purchases.total', 'Purchases.created_at')
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '10')
                        ->orwhereMonth('Purchases.created_at', '11')
                        ->orwhereMonth('Purchases.created_at', '12')
                        ->get();
        $total_price = DB::table('Purchases')
                        ->select(DB::raw('SUM(total) as total_price'))
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '10')
                        ->orwhereMonth('Purchases.created_at', '11')
                        ->orwhereMonth('Purchases.created_at', '12')
                        ->get();
        $total_purchase = DB::table('Purchases')
                        ->whereYear('Purchases.created_at', $year)
                        ->whereMonth('Purchases.created_at', '10')
                        ->orwhereMonth('Purchases.created_at', '11')
                        ->orwhereMonth('Purchases.created_at', '12')
                        ->count();
        return ['statistics' => $statistics, 'total_price' => $total_price, 'total_purchase' => $total_purchase];
    }

    public function revenue_Quarter(Request $res)
    {
        $data = $res->input();

        $quarter = $data['quarter'];
        $year = $data['year'];

        if($quarter == 1)
        {
            return response()->json($this->firstQuarter($year), 200);
        }
        if($quarter == 2)
        {
            return response()->json($this->secondQuarter($year), 200);
        }
        if($quarter == 3)
        {
            return response()->json($this->thirdQuarter($year), 200);
        }
        if($quarter == 4)
        {
            return response()->json($this->fourthQuarter($year), 200);
        }
        return response()->json(['statistics' => [],'total_price'=> 0,  'total_purchase' => 0], 200);
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

    public function removeProduct($id){
        DB::table('Products')->where('id_product', '=', $id)->delete();
        return redirect('/');
    }

}