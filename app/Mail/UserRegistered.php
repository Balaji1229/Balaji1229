<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class UserRegistered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
 
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.User_Registered')->subject('Email Confirmation')->with([ 'name' => $this->user->name, ]);
    }
}
