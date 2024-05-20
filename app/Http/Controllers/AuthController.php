<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['msg' => 'User Not Found']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['msg' => 'Password not same']);
        }

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if (Auth::check() && $user->role == 'ADMIN') {
            return redirect()->route('admin.index');
        } else if (Auth::check() && $user->role == 'SALES') {
            return redirect()->route('sales.index');
        }
    }
}
