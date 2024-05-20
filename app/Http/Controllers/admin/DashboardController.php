<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_penjualan' => Transaction::count(),
            'total_customer' => Customer::count(),
            'total_product' => Product::count(),
            'grafik_penjualan' => Transaction::select(DB::raw('count(*) as total'),DB::raw('date(created_at) as dates'))
            ->groupBy('dates')
            ->orderBy('dates','desc')
           ->get(),
            'grafik_customer' => Customer::select(DB::raw('count(*) as total'),DB::raw('date(created_at) as dates'))
            ->groupBy('dates')
            ->orderBy('dates','desc')
           ->get(),
            'grafik_product' => Product::select(DB::raw('count(*) as total'),DB::raw('date(created_at) as dates'))
            ->groupBy('dates')
            ->orderBy('dates','desc')
           ->get(),
        ];

        return view('index', compact('data'));
    }
}
