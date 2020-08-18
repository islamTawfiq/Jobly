<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AddReservetion extends Notification
{
    use Queueable;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['database'];
    }



    public function toDatabase($notifiable)
    {
        return [
            'data' => $this->data['id'],
            'contain' => 'new request from #' . $this->data['import_id'] . ' to make interview with worker'
        ];
    }
}
