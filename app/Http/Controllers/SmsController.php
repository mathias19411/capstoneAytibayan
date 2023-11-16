<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function sendsms(){
        $sid = getenv("TWILIO_AUTH_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $senderNumber = getenv("TWILIO_PHONE");
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
                        ->create("+63 992 303 4018", // to
                                [
                                    "body" => "This is the ship that made the Kessel Run in fourteen parsecs?",
                                    "from" => $senderNumber
                                ]
                        );

                        dd('message sent sucessful!');
    }
}
