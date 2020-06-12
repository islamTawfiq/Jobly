<?php

namespace App\Http\Controllers\site\auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function ShowLoginPage()
    {
        if (auth()->check()) {
            return redirect('/');
        } else {
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {

        request()->validate([
            'phone' => 'required',
            'password' => 'required',
            ]);

        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/')->with('success' , 'Welcome to Jobly');
        } else {
            return redirect()->back()->with('error', 'Oppes! Invalid  Phone or Password');
        }
    }


}
