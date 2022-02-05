<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:8|max:30',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('fail', 'Inncorrect Credintials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
