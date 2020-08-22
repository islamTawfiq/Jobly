<?php

namespace App\Http\Controllers\Admin\start;

use App\Http\Controllers\Controller;
use App\Model\Link;
use App\Model\Start;
use Illuminate\Http\Request;

class startController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:about_show', ['only' => 'index', 'show']);
        $this->middleware('permission:about_add', ['only' => 'store', 'create']);
        $this->middleware('permission:about_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:about_delete', ['only' => 'destroy']);
    }

    public function index()
    {
        $item = Start::first();
        return view('admin.start.edit', compact('item'));
    }

   public function update(Request $request)
   {
       $item = Start::first();
       $data = $request->validate([
           'family' => 'sometimes|string',
           'family_instruction1' => 'sometimes|string',
           'family_instruction2' => 'sometimes|string',
           'family_instruction3' => 'sometimes|string',
           'sourcing' => 'sometimes|string',
           'sourcing_instruction1' => 'sometimes|string',
           'sourcing_instruction2' => 'sometimes|string',
           'sourcing_instruction3' => 'sometimes|string',
           'agent' => 'sometimes|string',
           'agent_instruction1' => 'sometimes|string',
           'agent_instruction2' => 'sometimes|string',
           'agent_instruction3' => 'sometimes|string',
       ]);

       $item->update($data);
       return redirect()->back()->with('success','Updated Successfully ');

   }

}
