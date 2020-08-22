<?php

namespace App\Http\Controllers\Admin\users;

use App\Http\Controllers\Controller;
use App\Model\Message;
use App\Model\User;
use Illuminate\Http\Request;
use App\Notifications\NewMessage;
use Notification;

class SendController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:brokers_show', ['only' => 'index', 'show']);
        $this->middleware('permission:brokers_add', ['only' => 'store', 'create']);
        $this->middleware('permission:brokers_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:brokers_delete', ['only' => 'destroy']);
    }

    public function Send($id){
        $user = User::findorfail($id);
        return view('admin.users.send', compact('user'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'message'      => 'required|string',
        ]);

        $data['sender_id'] = Auth()->user()->id;
        $data['receiver_id']  = $id;
        if($data = Message::create($data)) {
            $users['receiver'] = User::find($id);
            Notification::send($users, new NewMessage($data));
        }
        
        return redirect()->back()->with('success', 'Message Sent Successfully');
    }


}
