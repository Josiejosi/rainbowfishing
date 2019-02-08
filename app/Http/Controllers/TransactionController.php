<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Orders ;
use App\Classes\Helpers ;
use App\Classes\Notifications ;

use Carbon\Carbon ;

class TransactionController extends Controller {

    public function __construct() { $this->middleware('auth') ; }

    public function incoming() {

        
        $incoming                   = Orders::where( 'user_id', auth()->user()->id )->where( 'status','<>', 0 )->get() ;

        return view( 'incoming', ['incoming'=>$incoming]  ) ;

    }

    public function outgoing() {

    	$outgoing                   = Orders::where( 'sender_id', auth()->user()->id )->where( 'status','<>', 0 )->get() ;

        return view( 'outgoing', ['outgoing'=>$outgoing] ) ;

    }

}
