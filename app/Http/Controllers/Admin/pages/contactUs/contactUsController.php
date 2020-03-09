<?php

namespace App\Http\Controllers\Admin\pages\contactUs;

use App\Http\Controllers\Controller;
use App\Model\ContactUs;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class contactUsController extends Controller
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
        $item = ContactUs::first();
        return view('admin.pages.contactUs.edit', compact('item'));
    }

   public function update(Request $request)
   {

       $item = ContactUs::first();
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
