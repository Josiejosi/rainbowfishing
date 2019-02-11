<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon ;

use App\Orders ;
use App\User ;

use App\Classes\Helpers ;

class HomeController extends Controller {

    public function __construct() { $this->middleware( 'auth' ) ; }

    public function index() {

        $linked_account             = false ;

        if ( auth()->user()->account != null ) {

            $linked_account         = true ;
            
        }

        $orders                     = Orders::where( 'matures_at', '<', Carbon::now() )
                                             ->where( 'status', 0 )
                                             ->where( 'user_id', '<>', auth()->user()->id )
                                             ->orderBy('matures_at', 'desc')->take(15)
                                             ->get() ;

        $outgoing                   = Orders::where( 'sender_id', auth()->user()->id )
                                            ->where( 'status','<>', 0 )
                                            ->orderBy('updated_at', 'desc')
                                            ->take(5)
                                            ->get() ;

        $incoming                   = Orders::where( 'user_id', auth()->user()->id )
                                             ->where( 'status','<>', 0 )
                                             ->orderBy('updated_at', 'desc')
                                             ->take(5)
                                             ->get() ;

        $outgoing_amount            = Orders::where( 'sender_id', auth()->user()->id )->where( 'status', 3 )->get()->sum('amount') ;
        $pending_amount             = Orders::where( 'sender_id', auth()->user()->id )->where( 'status', 1 )->orWhere( 'status', 2 )->get()->sum('amount') ;
        $incoming_amount            = Orders::where( 'user_id', auth()->user()->id )->where( 'status', 3 )->get()->sum('amount') ;

        return view( 'home', [

            'list_hour'             => $this->list_hour(), 
            'linked_account'        => $linked_account,  
            'orders'                => $orders, 
            'outgoing'              => $outgoing, 
            'incoming'              => $incoming, 

            'outgoing_amount'       => $outgoing_amount, 
            'pending_amount'        => $pending_amount, 
            'incoming_amount'       => $incoming_amount, 

        ]) ;

    }

    private function list_hour() {

        $early_list                 = true ;
        $late_list                  = true ;

        $timezone                   = 'Africa/Johannesburg' ;

        $today_twelve               = Carbon::parse('today 12pm', $timezone) ;
        $today_one                  = Carbon::parse('today 1pm', $timezone) ;

        $today_eight                = Carbon::parse('today 8pm', $timezone) ;
        $today_nine                 = Carbon::parse('today 9pm', $timezone) ;

        $early_list_start           = $today_twelve->format('d M h:i:s A') ;
        $early_list_ends            = $today_one->format('d M h:i:s A') ;

        $late_list_start            = $today_eight->format('d M h:i:s A') ;
        $late_list_end              = $today_nine->format('d M h:i:s A') ;

        // Now
        $now                        = Carbon::now($timezone) ;

        //Controlling time.
        //
        if ( $now->gte($today_twelve) && $now->lte($today_one) ) {
            $early_list             = true ;
        }

        if ( $now->gte($today_eight) && $now->lte($today_nine) ) {
            $late_list              = true ;
        }


        return [ 
            'today_twelve'          => $today_twelve, 
            'today_one'             => $today_one, 

            'today_eight'           => $today_eight, 
            'today_nine'            => $today_nine,  

            'early_list_start'      => $early_list_start, 
            'early_list_ends'       => $early_list_ends,  

            'late_list_start'       => $late_list_start, 
            'late_list_end'         => $late_list_end, 

            'early_list'            => $early_list, 
            'late_list'             => $late_list, 
        ] ;

    }
}
