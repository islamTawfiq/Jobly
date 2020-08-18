<?php

namespace App\Http\Controllers\Site\dashboard\broker;

use App\Http\Controllers\Controller;
use App\Model\Message;
use App\Model\Skills;
use App\Model\Nanny;
use App\Model\Reservation;
use App\Model\User;
use App\Notifications\ConfirmInterView;
use App\Notifications\RejectInterview;
use App\Notifications\NewMessage;
use Illuminate\Http\Request;
use Notification;

class clientOrdersController extends Controller
{

    public function index()
    {
        $id = Auth()->user()->id;
        $reservations = Reservation::get();
        $nannies = (Reservation::where('broker_id',$id))
        ->with('workers')->where('status','<>', 0)->latest()->get();
        return view('site.brokerDashboard.clientOrders', compact('nannies','reservations'));
    }

    public function confirmInterview($id)
    {
        $nanny = Reservation::findorfail($id);
        $data['status'] = 4;
        if($nanny->update($data)) {
            $worker = Nanny::findOrFail($nanny->workers->id);
            $data['status'] = 2;
            $worker->update($data);

            $data['id'] = $nanny->id;
            $data['nanny_id'] = $nanny->nanny_id;
            $data['import_id'] = $nanny->import_id;
            $data['broker_id'] = auth()->user()->id;

            $users['importer'] = User::find($data['import_id']);
            $users['admin'] = User::find(1);
            Notification::send($users, new ConfirmInterView($data));
        }
        return redirect()->back()->with('success', 'Interview Confirmed Successfully');
    }

    public function rejectInterview($id)
    {
        $nanny = Reservation::findorfail($id);
        $data['status'] = 3;
        if($nanny->update($data)) {
            $worker = Nanny::findOrFail($nanny->workers->id);
            $data['status'] = 0;
            $worker->update($data);

            $data['id'] = $nanny->id;
            $data['nanny_id'] = $nanny->nanny_id;
            $data['import_id'] = $nanny->import_id;
            $data['broker_id'] = auth()->user()->id;

            $users['importer'] = User::find($data['import_id']);
            $users['admin'] = User::find(1);
            Notification::send($users, new RejectInterview($data));
        }
        return redirect()->back()->with('success', 'rejected successfully');
    }

    public function notes(Request $request, $nanny_id, $receiver_id)
    {
        $data = $request->validate([
            'message'     => 'required|string',
        ]);
        $data['nanny_id'] = $nanny_id;
        $data['sender_id'] = Auth()->user()->id;
        $data['receiver_id']  = $receiver_id;
        if($data = Message::create($data)) {
            $users['receiver'] = User::find($receiver_id);
            $users['admin'] = User::find(1);
            Notification::send($users, new NewMessage($data));
        }
        return redirect()->back()->with('success', 'notes send successfully');
    }

}
