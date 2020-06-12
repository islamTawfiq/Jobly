<?php

namespace App\Http\Controllers\Admin\skills;

use App\Http\Controllers\Controller;
use App\Model\Skills;
use DataTables;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:skills_show', ['only' => 'index', 'show']);
        $this->middleware('permission:skills_add', ['only' => 'store', 'create']);
        $this->middleware('permission:skills_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:skills_delete', ['only' => 'destroy']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()){
            $items = Skills::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.skills.index');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'skill_en' => 'sometimes|nullable|string',
            'skill_ar' => 'sometimes|nullable|string',
        ]);
        Skills::create($data);
        return redirect()->back()->with('success', trans('created successfully'));
    }

    public function edit($id)
    {
        $item = Skills::findorfail($id);
        return view('admin.skills.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = Skills::findorfail($id);
        $data = $request->validate([
            'skill_en' => 'sometimes|nullable|string',
            'skill_ar' => 'sometimes|nullable|string',
        ]);

        $item->update($data);
        return redirect()->back()->with('success', trans('updated successfully'));

    }

    public function destroy($id)
    {
        $item = Skills::findorfail($id)->delete();
        if (Skills::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }
    }
}
