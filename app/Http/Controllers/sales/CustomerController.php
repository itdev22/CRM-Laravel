<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(Request $request)
    {
        Customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company'=>$request->company,
        ]);

        return view('admin.users.index');
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
        return view('admin.users.index');
    }

    public function delete($id, Request $request)
    {
        Customer::where('id', $id)->destroy();
        return view('admin.users.index');
    }
}
