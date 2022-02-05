<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request)
    {
        //validate user input data
        $userValidated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:30',
            'cpassword' => 'required|min:8|max:30|same:password',
        ]);

        //create new user
        $user = User::create(array_merge(
            $userValidated,
            [
              'password' => Hash::make($request->password),
            ]
          ));

        //view response for user
        if($user){
            $this->check($request);
            return redirect()->route('user.home');
        }else{
            return redirect()->back()->with('fail', 'Something went wrong');
        }
    }

    public function check(Request $request)
    {
        //validate user input data
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:30',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail', 'Inncorrect Credintials');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
