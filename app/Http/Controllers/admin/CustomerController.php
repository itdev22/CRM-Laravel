<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $data = Customer::where('name','like','%'. $request->search .'%')->paginate()->withQueryString();

        return view('admin.customer.index', compact('data'));
    }
    public function create(Request $request)
    {
        $user_id = 2;
        Customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company'=>$request->company,
            'user_id'=>$user_id
        ]);
        return redirect()->route('admin.customer.index');
    }

    public function read()
    {
        Customer::all();
        return view('admin.users.index');
    }

    public function update($id, Request $request)
    {
        Customer::where('id', $id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company'=>$request->company,
        ]);
        return redirect()->route('admin.customer.index');
    }

    public function delete($id)
    {
        Customer::where('id', $id)->delete();
        return redirect()->route('admin.customer.index');
    }
}
