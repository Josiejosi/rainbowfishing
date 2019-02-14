<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Split ;
use App\Orders ;
use App\Classes\Helpers ;
use App\Classes\Notifications ;

use Carbon\Carbon ;

class TransactionController extends Controller {

    public function __construct() { $this->middleware('auth') ; }

    public function incoming() {

        $incoming                   = Orders::where( 'user_id', auth()->user()->id )
                                             ->where( 'status','<>', 0 )
                                             ->orderBy('updated_at', 'desc')
                                             ->get() ;

        $incoming_split             = Split::where( 'receiver_id', auth()->user()->id )
                                             ->where( 'status','<>', 0 )
                                             ->orderBy('updated_at', 'desc')
                                             ->get() ;

        return view( 'incoming', [
        	'incoming'=>$incoming,
        	'incoming_split'=>$incoming_split,
        ]) ;

    }

    public function outgoing() {

        $outgoing                   = Orders::where( 'sender_id', auth()->user()->id )
                                            ->where( 'status','<>', 0 )
                                            ->orderBy('updated_at', 'desc')
                                            ->get() ;

        $outgoing_split             = Split::where( 'sender_id', auth()->user()->id )
                                            ->where( 'status','<>', 0 )
                                            ->orderBy('updated_at', 'desc')
                                            ->get() ;

        return view( 'outgoing', [
        	'outgoing'=>$outgoing,
        	'outgoing_split'=>$outgoing_split,
        ]) ;

    }

}
