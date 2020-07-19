<?php

namespace App\Http\Controllers\Admin\users\agencies;

use App\Http\Controllers\Controller;
use App\Model\User;
use DataTables;
use Illuminate\Http\Request;

class AgenciesController extends Controller
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
        return view('admin.users.agencies.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = User::findorfail($id);
        return view('admin.users.agencies.edit', compact('item'));
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
