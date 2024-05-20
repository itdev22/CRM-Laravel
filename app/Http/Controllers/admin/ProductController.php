<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('admin.product.index',compact('data'));
    }
    public function create(Request $request)
    {
        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);

        return redirect()->route('admin.product.index');
    }

    public function update($id,Request $request)
    {
        Product::where('id', $id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);

        return redirect()->route('admin.product.index');
    }
    public function delete($id)
    {
        Product::where('id', $id)->delete();

        return redirect()->route('admin.product.index');
    }
}
