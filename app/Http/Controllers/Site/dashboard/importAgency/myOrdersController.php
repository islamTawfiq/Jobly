<?php

namespace App\Http\Controllers\Site\dashboard\importAgency;

use App\Http\Controllers\Controller;
use App\Model\Message;
use App\Model\Nanny;
use App\Model\User;
use App\Model\Reservation;
use App\Notifications\Approve;
use App\Notifications\Cancel;
use App\Notifications\RejectNanny;
use App\Notifications\NewMessage;
use Illuminate\Http\Request;
use Notification;

class myOrdersController extends Controller
{
    public function index()
    {
        $id = Auth()->user()->id;
        $reserv = Reservation::get();
        // $messages = Message::where('import_id',$id)->get();
        $nannies = (\App\Model\Reservation::where('import_id',$id))
        ->with('workers')->where('status','<>', 0)->latest()->get();

        return view('site.importAgencyDashboard.myOrders', compact('nannies'));
    }

    public function cancel($id)
    {
        $nanny = Reservation::findorfail($id);
        $data['status'] = 2;
        if($nanny->update($data)) {
            $worker = Nanny::findOrFail($nanny->workers->id);
            $data['status'] = 0;
            $worker->update($data);

            $data['id'] = $nanny->id;
            $data['nanny_id'] = $nanny->nanny_id;
            $data['broker_id'] = $nanny->broker_id;
            $data['import_id'] = auth()->user()->id;

            $users['exporter'] = User::find($data['broker_id']);
            $users['admin'] = User::find(1);
            Notification::send($users, new Cancel($data));
        }
        return redirect()->back()->with('success', 'rejected successfully');
    }

    public function reject($id)
    {
        $nanny = Reservation::findorfail($id);
        $data['status'] = 5;
        if($nanny->update($data)) {
            $worker = Nanny::findOrFail($nanny->workers->id);
            $data['status'] = 0;
            $worker->update($data);

            $data['id'] = $nanny->id;
            $data['nanny_id'] = $nanny->nanny_id;
            $data['broker_id'] = $nanny->broker_id;
            $data['import_id'] = auth()->user()->id;

            $users['exporter'] = User::find($data['broker_id']);
            $users['admin'] = User::find(1);
            Notification::send($users, new RejectNanny($data));
        }
        return redirect()->back()->with('success', 'rejected successfully');
    }

    public function approve($id)
    {
        $nanny = Reservation::findorfail($id);
        $data['status'] = 6;
        if($nanny->update($data)) {
            $worker = Nanny::findOrFail($nanny->workers->id);
            $data['status'] = 3;
            $worker->update($data);

            $data['id'] = $nanny->id;
            $data['nanny_id'] = $nanny->nanny_id;
            $data['broker_id'] = $nanny->broker_id;
            $data['import_id'] = auth()->user()->id;

            $users['exporter'] = User::find($data['broker_id']);
            $users['admin'] = User::find(1);
            Notification::send($users, new Approve($data));
        }
        return redirect()->back()->with('success', 'rejected successfully');
    }

    public function notes(Request $request, $nanny_id, $receiver_id)
    {
        $data = $request->validate([
            'message'     => 'required|string',
        ]);
        $data['nanny_id']  = $nanny_id;
        $data['sender_id'] = Auth()->user()->id;
        $data['receiver_id'] = $receiver_id;

        if($data = Message::create($data)) {
            $users['receiver'] = User::find($receiver_id);
            $users['admin'] = User::find(1);
            Notification::send($users, new NewMessage($data));
        }
        return redirect()->back()->with('success', 'notes send successfully');
    }



}
