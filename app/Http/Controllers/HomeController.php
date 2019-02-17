<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon ;

use App\Orders ;
use App\User ;
use App\Split ;

use App\Classes\Helpers ;

class HomeController extends Controller {

    public function __construct() { $this->middleware( 'auth' ) ; $this->middleware( 'blocked' ) ; }

    public function index() {

        $linked_account             = false ;

        if ( auth()->user()->account != null ) {

            $linked_account         = true ;
            
        }

        $orders                     = Orders::where( 'matures_at', '<', Carbon::now() )
                                             ->where( 'status', 0 )
                                             ->where( 'user_id', '<>', auth()->user()->id )
                                             ->orderBy('created_at', 'desc')->take(15)
                                             ->get() ;

        $outgoing                   = Orders::where( 'sender_id', auth()->user()->id )
                                            ->where( 'status','<>', 0 )
                                            ->orderBy('created_at', 'desc')
                                            ->take(5)
                                            ->get() ;

        $incoming                   = Orders::where( 'user_id', auth()->user()->id )
                                             ->where( 'status','<>', 0 )
                                             ->orderBy('created_at', 'desc')
                                             ->take(5)
                                             ->get() ;

        $outgoing_split             = Split::where( 'sender_id', auth()->user()->id )
                                            ->where( 'status','<>', 0 )
                                            ->orderBy('created_at', 'desc')
                                            ->take(5)
                                            ->get() ;

        $incoming_split             = Split::where( 'receiver_id', auth()->user()->id )
                                             ->where( 'status','<>', 0 )
                                             ->orderBy('created_at', 'desc')
                                             ->take(5)
                                             ->get() ;

        $outgoing_amount            = Orders::where( 'sender_id', auth()->user()->id )->where( 'status', 3 )->get()->sum('amount') ;
        $incoming_amount            = Orders::where( 'user_id', auth()->user()->id )->where( 'status', 3 )->get()->sum('amount') ;


        $outgoing_amount_split      = Split::where( 'sender_id', auth()->user()->id )->where( 'status', 3 )->get()->sum('amount') ;
        $incoming_amount_split      = Split::where( 'receiver_id', auth()->user()->id )->where( 'status', 3 )->get()->sum('amount') ;

        return view( 'home', [

            'list_hour'             => Helpers::getSlotTime(), 
            'linked_account'        => $linked_account,  
            'orders'                => $orders, 
            'outgoing'              => $outgoing, 
            'incoming'              => $incoming,  

            'outgoing_split'        => $outgoing_split, 
            'incoming_split'        => $incoming_split, 

            'outgoing_amount'       => $outgoing_amount + $outgoing_amount_split,
            'incoming_amount'       => $incoming_amount +  $incoming_amount_split, 

        ]) ;

    }
}
