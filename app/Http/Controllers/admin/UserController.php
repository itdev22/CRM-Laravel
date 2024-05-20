<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.users.index');
    }
    public function read()
    {
        return view('admin.users.index');
    }
    public function update()
    {
        return view('admin.users.index');
    }
    public function delete()
    {
        return view('admin.users.index');
    }
}
