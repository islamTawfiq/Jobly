<?php
namespace App\Http\Controllers\Site\home;
use App\Http\Controllers\Controller;
use App\Model\Message;
use App\Model\Reservation;
class HomeController extends Controller
{
    public function index()
    {
        // $items = User::where('user_type_id', 1)->where('status',1)->latest()->get();
        // return view('site.home.index', compact('items'));
    }

    public function show($id)
    {
        $nanny = Reservation::find($id);
        $message = Message::find($id);
        return view('site.notifications.notify', compact('nanny','message'));
    }

    public function showMessage($id)
    {
        $message = Message::find($id);
        return view('site.notifications.message', compact('message'));
    }
}
