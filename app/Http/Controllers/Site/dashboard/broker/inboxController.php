<?php

namespace App\Http\Controllers\Site\dashboard\broker;

use App\Http\Controllers\Controller;
use App\Model\Message;

class inboxController extends Controller
{

    public function index()
    {
        $id = Auth()->user()->id;
        $messages = Message::where('receiver_id',$id)->latest()->get();
        return view('site.brokerDashboard.inbox', compact('messages'));
    }

    public function destroy($id)
    {
        $item = Message::findorfail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Message Deleted Successfully');

    }

}
