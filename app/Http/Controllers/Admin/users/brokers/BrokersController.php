<?php

namespace App\Http\Controllers\Admin\users\brokers;

use App\Http\Controllers\Controller;
use App\Model\User;
use DataTables;
use Illuminate\Http\Request;

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
