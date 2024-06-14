<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailConfirmation;
use App\Events\UserRegistered;



class SendEmailConfirmation implements ShouldQueue
{
    use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    public function handle(UserRegistered $event)
    {
        Mail::to($event->email)->send(new EmailConfirmation());
    }
}
    