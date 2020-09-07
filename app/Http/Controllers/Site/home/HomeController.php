<?php
namespace App\Http\Controllers\Site\home;
use App\Http\Controllers\Controller;
use App\Model\Message;
use App\Model\Reservation;
class HomeController extends Controller
{
    // public function index()
    // {
    //     $items = User::where('user_type_id', 1)->where('status',1)->latest()->get();
    //     return view('site.home.index', compact('items'));
    // }

    public function show($id , $reservation_id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        $nanny = Reservation::find($reservation_id);

        if ($notification) {
            $notification->markAsRead();
        }
        return view('site.notifications.notify', compact('nanny'));
    }

    public function showMessage($id , $message_id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        $message = Message::find($message_id);

        if ($notification) {
            $notification->markAsRead();
        }
        return view('site.notifications.message', compact('message'));
    }

}
