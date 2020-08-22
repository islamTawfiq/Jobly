<?php

namespace App\Http\Controllers\Admin\links;

use App\Http\Controllers\Controller;
use App\Model\Link;
use Illuminate\Http\Request;

class linksController extends Controller
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
        $item = Link::first();
        return view('admin.links.edit', compact('item'));
    }

   public function update(Request $request)
   {
       $item = Link::first();
       $data = $request->validate([
           'home' => 'sometimes|string',
           'domestic_workers' => 'sometimes|string',
           'local_domestic_workers' => 'sometimes|string',
           'about' => 'sometimes|string',
           'contact' => 'sometimes|string',
           'sourcing_broker' => 'sometimes|string',
           'sourcing_agency' => 'sometimes|string',
           'recruitment_agency' => 'sometimes|string',
           'sponsorship' => 'sometimes|string',
       ]);

       $item->update($data);
       return redirect()->back()->with('success','Updated Successfully ');

   }

}
