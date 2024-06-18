<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailConfirmation;

class SendEmailConfirmation implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $email = $event->email;
        $name = $event->name;
    
        // Log the email address and name for debugging purposes
        Log::info('Email to send: ' . $email);
        Log::info('Name associated with the email: ' . $name);
    
        try {
            Mail::to($email)->send(new EmailConfirmation($name));
        } catch (\Exception $e) {
            Log::error('Failed to send email confirmation: ' . $e->getMessage());
        }
    }
    
    
    
}
