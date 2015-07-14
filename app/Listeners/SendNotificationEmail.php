<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendNotificationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        Mail::send('emails.welcomeemail', ['user' => $event->user], function ($message) {
            $message->from('josemariairiarte@gmail.com');
            $message->to('foo@example.com')->cc('bar@example.com');
            });
    }
}
