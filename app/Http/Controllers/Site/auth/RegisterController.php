<?php

namespace App\Http\Controllers\site\auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public  function  ShowBrokerRegister(){
        if (auth()->check()){
            return redirect('/');
        }else{
            return view('auth.brokerRegister');
        }
    }
    public  function  ShowAgencyRegister(){
        if (auth()->check()){
            return redirect('/');
        }else{
            return view('auth.agencyRegister');
        }
    }
    public  function  BrokerRegister(Request $request){
        if (auth()->check()){
            return redirect('/');
        }else{
            $data = $request->validate([
                'first_name'      => 'required|string',
                'last_name'       => 'required|string',
                'phone'           => 'required|regex:/(01)[0-9]{9}/|unique:users,phone',
                'whatsapp'        => 'required|string',
                'email'           => 'required|email|unique:users,email',
                'password'        => 'required|min:6|confirmed',
                'user_image'      => 'required|nullable|image',

            ]);
            $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
            $request->hasFile('user_image') ?  $data['user_image'] = $this->storeFile($request->user_image, 'userImages') : '';
            $data['password'] = Hash::make($request->password);
            $data['user_type_id'] = 2;
            $data['status'] = 0;
            $user = User::create($data);
            Auth::login($user);
            return redirect('/broker-dashboard/all-cvs')->with('success', 'Thanks, Please Waite To Accept Your Acount');
        }
    }
    public  function  AgencyRegister(Request $request){
        if (auth()->check()){
            return redirect('/');
        }else{
            $data = $request->validate([
                'agency_name'     => 'required|string',
                'manager_name'    => 'required|string',
                'phone'           => 'required|regex:/(01)[0-9]{9}/|unique:users,phone',
                'telephone'       => 'required|string',
                'email'           => 'required|email|unique:users,email',
                'password'        => 'required|min:6|confirmed',
                'user_image'      => 'required|nullable|image',

            ]);
            $data['name'] = $data['agency_name'];
            $request->hasFile('user_image') ?  $data['user_image'] = $this->storeFile($request->user_image, 'userImages') : '';
            $data['password'] = Hash::make($request->password);
            $data['user_type_id'] = 3;
            $data['status'] = 0;
            $user = User::create($data);
            Auth::login($user);
            return redirect('/')->with('success', 'Thanks, Please Waite To Accept Your Acount');
        }
    }

    // public  function  clientRegister(Request $request){
    //     if (auth()->check()){
    //         return redirect('/');
    //     }else{
    //         $data = $request->validate([
    //             'first_name' => 'required|string',
    //             'last_name' => 'required|string',
    //             'city' => 'required|string',
    //             'notes' => 'sometimes|nullable|string',
    //             'email' => 'required|email|unique:users,email',
    //             'first_phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,first_phone',
    //             'password' => 'required|min:6',
    //         ]);
    //         $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
    //         $data['password'] = Hash::make($request->password);
    //         $data['user_type_id'] = 0;
    //         $user = User::create($data);
    //         Auth::login($user);
    //         return redirect('/')->with('success', 'مرحبا بك , شكرا للتسجيل في هير موسي');
    //     }
    // }


}
