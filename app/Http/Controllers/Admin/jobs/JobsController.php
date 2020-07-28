<?php

namespace App\Http\Controllers\Admin\jobs;

use App\Http\Controllers\Controller;
use App\Model\Job;
use DataTables;
use Illuminate\Http\Request;

class JobsController extends Controller
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
            $items = Job::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.jobs.index');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'sometimes|nullable|string',
        ]);
        Job::create($data);
        return redirect()->back()->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $item = Job::findorfail($id);
        return view('admin.jobs.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = Job::findorfail($id);
        $data = $request->validate([
            'title' => 'sometimes|nullable|string',
        ]);

        $item->update($data);
        return redirect()->back()->with('success', 'Updated Successfully');

    }

    public function destroy($id)
    {
        $item = Job::findorfail($id)->delete();
        if (Job::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }
    }
}
