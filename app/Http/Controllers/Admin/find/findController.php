<?php

namespace App\Http\Controllers\Admin\find;

use App\Http\Controllers\Controller;
use App\Model\Find;
use Illuminate\Http\Request;

class findController extends Controller
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
        $item = Find::first();
        return view('admin.find.edit', compact('item'));
    }

   public function update(Request $request)
   {
       $item = Find::first();
       $data = $request->validate([
           'title' => 'sometimes|string',
           'body' => 'sometimes|string',
       ]);

       $item->update($data);
       return redirect()->back()->with('success','Updated Successfully ');

   }

}
