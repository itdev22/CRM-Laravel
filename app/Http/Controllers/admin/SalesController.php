<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $data = User::where('role', 'sales')->get();

        return view('admin.sales.index', compact('data'));
    }

    public function create(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'SALES'
        ]);

        return redirect()->route('admin.sales.index');
    }

    public function update($id,Request $request)
    {
        User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.sales.index');
    }

    public function delete($id, Request $request)
    {
        User::where('id', $id)->delete();

        return redirect()->route('admin.sales.index');
    }
}
