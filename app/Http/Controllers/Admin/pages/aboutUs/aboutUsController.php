<?php

namespace App\Http\Controllers\Admin\pages\aboutUs;

use App\Http\Controllers\Controller;
use App\Model\AboutUs;
use Illuminate\Http\Request;
use Storage;

class aboutUsController extends Controller
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
        $item = AboutUs::first();
        return view('admin.pages.aboutUs.edit', compact('item'));
    }

   public function update(Request $request)
   {

       $item = AboutUs::first();
       $data = $request->validate([
           'title' => 'sometimes|string',
           'body'  => 'sometimes|string',
           'img1'  => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'img2'  => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'img3'  => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'img4'  => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       $request->hasFile('img1') ? $data['img1'] = $this->storeFile($request->img1, 'about-us') : '';
       $request->hasFile('img2') ? $data['img2'] = $this->storeFile($request->img2, 'about-us') : '';
       $request->hasFile('img3') ? $data['img3'] = $this->storeFile($request->img3, 'about-us') : '';
       $request->hasFile('img4') ? $data['img4'] = $this->storeFile($request->img4, 'about-us') : '';

       $item->update($data);
       return redirect()->back()->with('success','Updated Successfully ');

   }

}
