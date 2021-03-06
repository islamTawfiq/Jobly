<?php

namespace App\Http\Controllers\Admin\notifications;
use App\Http\Controllers\Controller;
use App\Model\Message;
use App\Model\Reservation;

class NotifyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:nannies_show', ['only' => 'index', 'show']);
        $this->middleware('permission:nannies_add', ['only' => 'store', 'create']);
        $this->middleware('permission:nannies_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:nannies_delete', ['only' => 'destroy']);
    }

    public function show($id , $reservation_id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        $nanny = Reservation::find($reservation_id);

        if ($notification) {
            $notification->markAsRead();
        }
        return view('admin.notifications.notify', compact('nanny'));

    }

    public function showMessage($id , $message_id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        $message = Message::find($message_id);

        if ($notification) {
            $notification->markAsRead();
        }
        return view('admin.notifications.message', compact('message'));
    }

}
