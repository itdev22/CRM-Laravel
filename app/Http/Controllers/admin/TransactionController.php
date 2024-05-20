<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $data = Transaction::with(['customer', 'user'])->paginate();
        return view('admin.transaction.index', compact('data'));
    }
    public function indexsale()
    {
        $data = Transaction::all();
        return view('admin.transaction.sale.index', compact('data'));
    }

    public function create()
    {
        try {
            DB::beginTransaction();
            // Insert into transactions table
            Transaction::create([
                'customer_id' => 1,
                'user_id' => 2,
                'code' => 'cash',
            ]);

            // Insert into transaction_details table
            foreach ([['transaction_id' => 1, 'product_id' => 1, 'qty' => 2, 'price' => 500, 'total' => 100000], ['transaction_id' => 1, 'product_id' => 2, 'qty' => 1, 'price' => 1000, 'total' => 100000]] as $detail) {
                TransactionDetail::create($detail);
            }
            DB::commit();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
        }
        return redirect()->route('admin.transaction.index');
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

    public function invoice($id)
    {
        return view('admin.transaction.invoice');
    }
}
