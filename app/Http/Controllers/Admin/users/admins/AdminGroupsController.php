<?php

namespace App\Http\Controllers\Admin\users\admins;

use App\Http\Controllers\Controller;
use App\Model\User;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use App\Model\AdminGroup;
use Illuminate\Support\Facades\Hash;

class AdminGroupsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:admin_groups_show', ['only' => 'index', 'show']);
        $this->middleware('permission:admin_groups_add', ['only' => 'store', 'create']);
        $this->middleware('permission:admin_groups_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:admin_groups_delete', ['only' => 'destroy']);
    }
    public function validate_value($request){
        $rule=[
            'name'=>'sometimes|nullable|string',
            'description'=>'sometimes|nullable|string',

            'settings_show'=>'sometimes|nullable|in:1,0',
            'settings_edit'=>'sometimes|nullable|in:1,0',

            'agencies_show'=>'sometimes|nullable|in:1,0',
            'agencies_add'=>'sometimes|nullable|in:1,0',
            'agencies_edit'=>'sometimes|nullable|in:1,0',
            'agencies_delete'=>'sometimes|nullable|in:1,0',

            'brokers_show'=>'sometimes|nullable|in:1,0',
            'brokers_add'=>'sometimes|nullable|in:1,0',
            'brokers_edit'=>'sometimes|nullable|in:1,0',
            'brokers_delete'=>'sometimes|nullable|in:1,0',

            'skills_show'=>'sometimes|nullable|in:1,0',
            'skills_add'=>'sometimes|nullable|in:1,0',
            'skills_edit'=>'sometimes|nullable|in:1,0',
            'skills_delete'=>'sometimes|nullable|in:1,0',

            'nannies_show'=>'sometimes|nullable|in:1,0',
            'nannies_add'=>'sometimes|nullable|in:1,0',
            'nannies_edit'=>'sometimes|nullable|in:1,0',
            'nannies_delete'=>'sometimes|nullable|in:1,0',

            'admins_show'=>'sometimes|nullable|in:1,0',
            'admins_add'=>'sometimes|nullable|in:1,0',
            'admins_edit'=>'sometimes|nullable|in:1,0',
            'admins_delete'=>'sometimes|nullable|in:1,0',

            'admin_groups_show'=>'sometimes|nullable|in:1,0',
            'admin_groups_add'=>'sometimes|nullable|in:1,0',
            'admin_groups_edit'=>'sometimes|nullable|in:1,0',
            'admin_groups_delete'=>'sometimes|nullable|in:1,0',

            'about_show'=>'sometimes|nullable|in:1,0',
            'about_add'=>'sometimes|nullable|in:1,0',
            'about_edit'=>'sometimes|nullable|in:1,0',
            'about_delete'=>'sometimes|nullable|in:1,0',

            'contact_show'=>'sometimes|nullable|in:1,0',
            'contact_add'=>'sometimes|nullable|in:1,0',
            'contact_edit'=>'sometimes|nullable|in:1,0',
            'contact_delete'=>'sometimes|nullable|in:1,0',

            'terms_show'=>'sometimes|nullable|in:1,0',
            'terms_add'=>'sometimes|nullable|in:1,0',
            'terms_edit'=>'sometimes|nullable|in:1,0',
            'terms_delete'=>'sometimes|nullable|in:1,0',

            'icons_show'=>'sometimes|nullable|in:1,0',
            'icons_add'=>'sometimes|nullable|in:1,0',
            'icons_edit'=>'sometimes|nullable|in:1,0',
            'icons_delete'=>'sometimes|nullable|in:1,0',
        ];
        $data =  $request->validate($rule);
        $new_data=[];
        foreach ($rule as $k => $v){
            if (empty($request->$k)){
                $new_data[$k]= '0' ;
                if ($k !== $request->name or $k !== $request->description ){

                }
            }else{
                $new_data[$k]= $request->$k ;
            }
        }
        $new_data['name'] =$data['name'];
        $new_data['description'] = $data['description'];
        return $new_data;
    }
    public function index(Request $request)
    {
        if ($request->ajax()){
            $item = AdminGroup::latest()->get();
            return DataTables::of($item)->make(true);
        }
        return view('admin.users.admins.groups.index');
    }

    public function create()
    {
        return view('admin.users.admins.groups.create');
    }
    public function store(Request $request)
    {
        AdminGroup::create($this->validate_value($request));
        return redirect()->back()->with('success', trans('web.groupHaveBeenCreatedSuccessfully'));
    }


    public function edit($id)
    {
        $item = AdminGroup::findOrFail($id);
        return view('admin.users.admins.groups.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = AdminGroup::findOrFail($id);
        $item->update($this->validate_value($request));
        return redirect()->back()->with('success',trans('web.groupHaveBeenEditedSuccessfully'));
    }

    public function destroy($id)
    {
        $item = AdminGroup::findorfail($id)->delete();
        if ( AdminGroup::find($id) ){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }

    }
}
