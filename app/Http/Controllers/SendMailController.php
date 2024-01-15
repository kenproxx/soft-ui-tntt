<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\User;

class SendMailController extends Controller
{
    public function sendMail()
    {
        $users = User::all();
        $message = [
            'type' => 'Create task',
            'content' => 'has been created!',
        ];
        SendEmail::dispatch($message, $users)->delay(now()->addMinute(1));
        return response()->json('ok');
    }
}
