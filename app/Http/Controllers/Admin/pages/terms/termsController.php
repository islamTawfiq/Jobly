<?php

namespace App\Http\Controllers\Admin\pages\terms;

use App\Http\Controllers\Controller;
use App\Model\Terms;
use Illuminate\Http\Request;

class termsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:terms_show', ['only' => 'index', 'show']);
        $this->middleware('permission:terms_add', ['only' => 'store', 'create']);
        $this->middleware('permission:terms_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:terms_delete', ['only' => 'destroy']);
    }

    public function index()
    {
        $item = Terms::first();
        return view('admin.pages.terms.edit', compact('item'));
    }

   public function update(Request $request)
   {

       $item = Terms::first();
       $data = $request->validate([
           'title' => 'sometimes|string',
           'body'  => 'sometimes|string',
       ]);

       $item->update($data);
       return redirect()->back()->with('success','Updated Successfully ');

   }

}
