<?php

namespace App\Http\Controllers\Admin\users\brokers;

use App\Http\Controllers\Controller;
use App\Model\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BrokersController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:brokers_show', ['only' => 'index', 'show']);
        $this->middleware('permission:brokers_add', ['only' => 'store', 'create']);
        $this->middleware('permission:brokers_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:brokers_delete', ['only' => 'destroy']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where(['user_type_id' => 2 , 'active' => 1])->latest()->get();
            return DataTables::of($users)->make(true);
        }
        return view('admin.users.brokers.index');
    }

    public function store(Request $request)
    {
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
        $data['status'] = 1;
        $data['active'] = 1;
        User::create($data);
        return redirect()->back()->with('success', 'Broker Created Successfully');
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.users.brokers.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::findorfail($id);
        $data = $request->validate([
            'first_name'      => 'required|string',
            'last_name'       => 'required|string',
            'country_id'      => 'required|integer',
            'address'         => 'required|string',
            'phonecode'       => 'required|integer',
            'mobileNumber'    => 'required|unique:users,mobileNumber,'.$user->id,
            'phone'           => 'unique:users,phone,'.$user->id,
            'whatsapp'        => 'sometimes|nullable|string',
            'email'           => 'sometimes|nullable|unique:users,email,'.$user->id,
        ]);

        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
        $data['phone'] = $data['phonecode'] . $data['mobileNumber'];
        if ($request->hasFile('user_image') && request()->has('user_image')) {
            $data['user_image'] = $this->storeFile($request->user_image);
        }

        if ($request->has('password') && request('password') != null) {
            $data['password'] = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return redirect()->back()->with('success', 'Broker Updated Successfully');

    }


    public function destroy($id)
    {
        $user = User::findorfail($id)->delete();
        if (User::find($id)) {
            return response()->json(false, 404);
        } else {
            return response()->json(true, 202);
        }
    }

    public function ChangeStatus(Request $request){
        $data = $request->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);
        $team = User::findOrFail($data['id']);
        $team->update($data);

        return response()->json($data['status']);
    }

}
