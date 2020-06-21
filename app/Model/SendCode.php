<?php

namespace App\Model;

use Nexmo\Laravel\Facade\Nexmo;

class SendCode
{
    public static function sendCode($phone) {
        $code = rand(1111,9999);
        Nexmo::message()->send([
            'to'   => '20' . $phone,
            'from' => 'Jobly',
            'text' => 'Verify Code: ' . $code,
        ]);
        return $code;
    }
}
