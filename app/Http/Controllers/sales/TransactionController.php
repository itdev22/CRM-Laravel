<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function create()
    {
        DB::transaction();
        try {
            // Insert into transactions table
            Transaction::create([
                'sales_id' => 1,
                'payment_method' => 'cash',
                'amount' => 1000,
            ]);

            // Insert into transaction_details table
            TransactionDetail::create([
                'transaction_id' => 1,
                'product_id' => 1,
                'quantity' => 2,
                'price' => 500,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return view('admin.users.index');
    }
    public function read()
    {
        Transaction::all();
        return view('admin.users.index');
    }
    public function update(Request $request)
    {
        return view('admin.users.index');
    }
    public function delete()
    {
        return view('admin.users.index');
    }
}
