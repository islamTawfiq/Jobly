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

    public  function  ShowImportAgencyRegister(){
        if (auth()->check()){
            return redirect('/');
        }else{
            return view('auth.importAgencyRegister');
        }
    }

    public  function  ShowExportAgencyRegister(){
        if (auth()->check()){
            return redirect('/');
        }else{
            return view('auth.exportAgencyRegister');
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
                'country_id'      => 'required|string',
                'address'         => 'required|string',
                'phonecode'       => 'required|integer',
                'mobileNumber'    => 'required|string|unique:users,mobileNumber',
                'phone'           => 'unique:users,phone',
                'whatsapp'        => 'sometimes|nullable|string',
                'email'           => 'sometimes|nullable|unique:users,email',
                'password'        => 'required|min:6|confirmed',
                'user_image'      => 'required|nullable|image',

            ]);
            $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
            $data['phone'] = $data['phonecode'] . $data['mobileNumber'];
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

    public  function  ImportAgencyRegister(Request $request){
        if (auth()->check()){
            return redirect('/');
        }else{
            $data = $request->validate([
                'agency_name'     => 'required|string',
                'manager_name'    => 'required|string',
                'country_id'      => 'required|string',
                'address'         => 'required|string',
                'phonecode'       => 'required|integer',
                'mobileNumber'    => 'required|string|unique:users,mobileNumber',
                'phone'           => 'unique:users,phone',
                'telephone'       => 'sometimes|nullable|string',
                'email'           => 'required|email|unique:users,email',
                'password'        => 'required|min:6|confirmed',
                'user_image'      => 'required|nullable|image',
            ]);
            $data['name'] = $data['agency_name'];
            $data['phone'] = $data['phonecode'] . $data['mobileNumber'];
            $request->hasFile('user_image') ?  $data['user_image'] = $this->storeFile($request->user_image, 'userImages') : '';
            $data['password'] = Hash::make($request->password);
            $data['user_type_id'] = 3;
            $data['status'] = 0;
            $data['active'] = 1;
            $user = User::create($data);
            Auth::login($user);
            return redirect('/')->with('success', 'Thanks, Please Waite To Accept Your Acount');
        }
    }

    public  function  ExportAgencyRegister(Request $request){
        if (auth()->check()){
            return redirect('/');
        }else{
            $data = $request->validate([
                'agency_name'     => 'required|string',
                'manager_name'    => 'required|string',
                'country_id'      => 'required|string',
                'address'         => 'required|string',
                'phonecode'       => 'required|integer',
                'mobileNumber'    => 'required|string|unique:users,mobileNumber',
                'phone'           => 'unique:users,phone',
                'telephone'       => 'sometimes|nullable|string',
                'email'           => 'required|email|unique:users,email',
                'password'        => 'required|min:6|confirmed',
                'user_image'      => 'required|nullable|image',
            ]);
            $data['name'] = $data['agency_name'];
            $data['phone'] = $data['phonecode'] . $data['mobileNumber'];
            $request->hasFile('user_image') ?  $data['user_image'] = $this->storeFile($request->user_image, 'userImages') : '';
            $data['password'] = Hash::make($request->password);
            $data['user_type_id'] = 5;
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
                'country_id'      => 'required|string',
                'address'         => 'required|string',
                'phonecode'       => 'required|integer',
                'mobileNumber'    => 'required|string|unique:users,mobileNumber',
                'phone'           => 'unique:users,phone',
                'email'           => 'sometimes|nullable|unique:users,email',
                'password'        => 'required|min:6|confirmed',

            ]);
            $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
            $data['phone'] = $data['phonecode'] . $data['mobileNumber'];
            $data['password'] = Hash::make($request->password);
            $data['user_type_id'] = 4;
            $data['status'] = 1;
            $data['active'] = 1;
            // if($data) {
            //     $data['code'] = SendCode::sendCode($data['phone']);
            //     $user = User::create($data);
            // }
            $user = User::create($data);
            Auth::login($user);
            // return redirect('/verify')->with('success', 'Thanks, Please Verify Code');
            return redirect('/')->with('success', 'Thanks, Welcome to jobly');

        }
    }

}
