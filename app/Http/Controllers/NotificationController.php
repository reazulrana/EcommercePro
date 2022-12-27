<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function sendSmsNotificaition()
    {
        $basic  = new \Vonage\Client\Credentials\Basic("0f3a4f2a", "23XxEzNv8GR9ewVD");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("8801922531242", "8801922531242", 'A text message sent using the Nexmo SMS API')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }

        // dd('SMS message has been delivered.');
    }
}
