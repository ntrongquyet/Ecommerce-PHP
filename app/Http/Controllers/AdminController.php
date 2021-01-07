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
        return view('Admin.Products.viewProductAdmin');
    } 

    public function top_Product()
    {
        return view('Admin.Products.topProductAdmin');
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
            ->select('Purchases.*', 'Status.description')->paginate($this->limit);
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

    public function revenue_Month()
    {
        return view('Admin.Revenue.revenueMonth');
    }

    public function revenue_Quarter()
    {
        return view('Admin.Revenue.revenueQuarter');
    }
    
    public function revenue_Year()
    {
        return view('Admin.Revenue.revenueYear');
    }

}