<?php

namespace App\Http\Controllers\Admin\pages\instructions;

use App\Http\Controllers\Controller;
use App\Model\Instruction;
use Illuminate\Http\Request;

class instructionController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:about_show', ['only' => 'index', 'show']);
        $this->middleware('permission:about_add', ['only' => 'store', 'create']);
        $this->middleware('permission:about_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:about_delete', ['only' => 'destroy']);
    }

    public function broker()
    {
        $item = Instruction::find(1);
        return view('admin.pages.brokerInstruction.edit', compact('item'));
    }

   public function updateBroker(Request $request)
   {

       $item = Instruction::find(1);
       $data = $request->validate([
           'title' => 'sometimes|string',
           'body'  => 'sometimes|string',
       ]);
       $data['status'] = 'broker';
       $item->update($data);
       return redirect()->back()->with('success','Updated Successfully ');

   }

    public function export()
    {
        $item = Instruction::find(2);
        return view('admin.pages.exportInstruction.edit', compact('item'));
    }

   public function updateExport(Request $request)
   {

       $item = Instruction::find(2);
       $data = $request->validate([
           'title' => 'sometimes|string',
           'body'  => 'sometimes|string',
       ]);
       $data['status'] = 'export';
       $item->update($data);
       return redirect()->back()->with('success','Updated Successfully ');
   }

    public function sponsor()
    {
        $item = Instruction::find(3);
        return view('admin.pages.sponsorInstruction.edit', compact('item'));
    }

   public function updateSponsor(Request $request)
   {

       $item = Instruction::find(3);
       $data = $request->validate([
           'title' => 'sometimes|string',
           'body'  => 'sometimes|string',
       ]);
       $data['status'] = 'export';
       $item->update($data);
       return redirect()->back()->with('success','Updated Successfully ');
   }

}
