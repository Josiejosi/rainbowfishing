<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\UserRegistered ;

use Illuminate\Support\Facades\Mail;

class ProcessUserRegisteredEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user ;
    protected $password ;

    public function __construct($user, $password) {

        $this->user         = $user ;
        $this->password     = $password ;
    }

    public function handle() {

        Mail::to( $this->user )->send( new UserRegistered( $this->password ) ) ;

    }
}
