<?php

namespace App\Http\Controllers\Admin\users\agencies;

use App\Http\Controllers\Controller;
use App\Model\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class importAgenciesController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:agencies_show', ['only' => 'index', 'show']);
        $this->middleware('permission:agencies_add', ['only' => 'store', 'create']);
        $this->middleware('permission:agencies_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:agencies_delete', ['only' => 'destroy']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where(['user_type_id' => 3 , 'active' => 1])->latest()->get();
            return DataTables::of($users)->make(true);
        }
        return view('admin.users.agencies.import.importAgency');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agency_name'     => 'required|string',
            'manager_name'    => 'required|string',
            'country_id'      => 'required|string',
            'address'         => 'required|string',
            'phone'           => 'required|unique:users,phone',
            'telephone'       => 'required|string',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|min:6|confirmed',
            'user_image'      => 'required|nullable|image',
        ]);
        $data['name'] = $data['agency_name'];
        $request->hasFile('user_image') ?  $data['user_image'] = $this->storeFile($request->user_image, 'userImages') : '';
        $data['password'] = Hash::make($request->password);
        $data['user_type_id'] = 3;
        $data['status'] = 1;
        $data['active'] = 1;
        User::create($data);
        return redirect()->back()->with('success', 'Agency Created Successfully');
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.users.agencies.import.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::findorfail($id);
        $data = $request->validate([
            'agency_name'     => 'required|string',
            'manager_name'    => 'required|string',
            'country_id'      => 'required|integer',
            'address'         => 'required|string',
            'phone'           => 'required|string',
            'telephone'       => 'required|string',
            'email'           => 'required|email|',
        ]);

        $data['name'] = $data['agency_name'];

        if ($request->has('password') && request('password') != null) {
            $data['password'] = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('user_image') && request()->has('user_image')) {
            $data['user_image'] = $this->storeFile($request->user_image);
        }

        $user->update($data);
        return redirect()->back()->with('success', 'Agency Updated Successfully');

    }

    public function destroy($id)
    {
        $item = User::findorfail($id)->delete();
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
