<?php

namespace App\Model;

use Aliraqi\ET\SMS;

class SendCode
{
    public static function sendCode($phone) {
        // Nexmo::message()->send([
            //     'to'   =>  $phone,
            //     'from' => 'Joobly',
            //     'text' => 'Verify Code: ' . $code,
            // ]);

            $code = rand(1111,9999);
            SMS::from('Joobly')
            ->to($phone)
            ->Message('Verify Code: ' . $code)
            ->send();
            return $code;

        // Get response object.
        // dd($sms->getResponse());
    }
}
