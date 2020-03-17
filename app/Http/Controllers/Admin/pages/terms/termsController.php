<?php

namespace App\Http\Controllers\Admin\pages\terms;

use App\Http\Controllers\Controller;
use App\Model\Terms;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class termsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:clients_show', ['only' => 'index', 'show']);
        $this->middleware('permission:clients_add', ['only' => 'store', 'create']);
        $this->middleware('permission:clients_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:clients_delete', ['only' => 'destroy']);
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
           'title_ar' => 'sometimes|string',
           'title_en' => 'sometimes|string',
           'body_ar' => 'sometimes|string',
           'body_en' => 'sometimes|string',
       ]);

       $item->update($data);
       return redirect()->back()->with('success','Salon Have Been Updated Successfully ');

   }

}
