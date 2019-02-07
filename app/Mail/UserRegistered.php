<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $password ;

    public function __construct($password) {
        
        $this->password = $password ;

    }

    public function build()
    {
        return $this->markdown('emails.registered');
    }
}
