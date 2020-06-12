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
        $this->middleware('permission:contact_show', ['only' => 'index', 'show']);
        $this->middleware('permission:contact_add', ['only' => 'store', 'create']);
        $this->middleware('permission:contact_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:contact_delete', ['only' => 'destroy']);
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
           'mobile' => 'sometimes|string',
           'text_ar' => 'sometimes|string',
           'text_en' => 'sometimes|string',
       ]);


       $item->update($data);
       return redirect()->back()->with('success','Salon Have Been Updated Successfully ');

   }

}
