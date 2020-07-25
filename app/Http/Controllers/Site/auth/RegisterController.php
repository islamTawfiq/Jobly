<?php

namespace App\Http\Controllers\Site\auth;

use App\Http\Controllers\Controller;
use App\Model\SendCode;
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

    public  function  ShowSponsorRegister(){
        if (auth()->check()){
            return redirect('/');
        }else{
            return view('auth.sponsorRegister');
        }
    }

    public  function  BrokerRegister(Request $request){
        if (auth()->check()){
            return redirect('/');
        }else{
            $data = $request->validate([
                'first_name'      => 'required|string',
                'last_name'       => 'required|string',
                'country'         => 'required|string',
                'address'         => 'required|string',
                'phone'           => 'required|unique:users,phone',
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
            $data['active'] = 1;
            // if($data) {
            //     $data['code'] = SendCode::sendCode($data['phone']);
            //     $user = User::create($data);
            // }
            $user = User::create($data);
            Auth::login($user);
            // return redirect('/verify')->with('success', 'Thanks, Please Verify Code');
            return redirect('/')->with('success', 'Thanks, Please Waite To Accept Your Acount');
        }
    }

    public  function  AgencyRegister(Request $request){
        if (auth()->check()){
            return redirect('/');
        }else{
            $data = $request->validate([
                'agency_name'     => 'required|string',
                'manager_name'    => 'required|string',
                'country'         => 'required|string',
                'address'         => 'required|string',
                'phone'           => 'required|unique:users,phone',
                'telephone'       => 'required|string',
                'email'           => 'required|email|unique:users,email',
                'password'        => 'required|min:6|confirmed',
                'user_image'      => 'required|nullable|image',
                'user_type_id'    => 'required',

            ]);
            $data['name'] = $data['agency_name'];
            $request->hasFile('user_image') ?  $data['user_image'] = $this->storeFile($request->user_image, 'userImages') : '';
            $data['password'] = Hash::make($request->password);
            // $data['user_type_id'] = 3;
            $data['status'] = 0;
            $data['active'] = 1;
            $user = User::create($data);
            Auth::login($user);
            return redirect('/')->with('success', 'Thanks, Please Waite To Accept Your Acount');
        }
    }

    public  function  SponsorRegister(Request $request){
        if (auth()->check()){
            return redirect('/');
        } else{
            $data = $request->validate([
                'first_name'      => 'required|string',
                'last_name'       => 'required|string',
                'country'         => 'required|string',
                'address'         => 'required|string',
                'phone'           => 'required|unique:users,phone',
                'email'           => 'required|email|unique:users,email',
                'password'        => 'required|min:6|confirmed',

            ]);
            $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
            $data['password'] = Hash::make($request->password);
            $data['user_type_id'] = 4;
            $data['status'] = 0;
            $data['active'] = 1;
            // if($data) {
            //     $data['code'] = SendCode::sendCode($data['phone']);
            //     $user = User::create($data);
            // }
            $user = User::create($data);
            Auth::login($user);
            // return redirect('/verify')->with('success', 'Thanks, Please Verify Code');
            return redirect('/')->with('success', 'Thanks, Please Waite To Accept Your Acount');

        }
    }

}
