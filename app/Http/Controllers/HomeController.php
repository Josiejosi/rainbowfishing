<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon ;

use App\Classes\Helpers ;

class HomeController extends Controller {

    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        $linked_account             = false ;

        if ( auth()->user()->account != null ) {

            $linked_account         = true ;
            
        }

        return view( 'home', ['list_hour' => $this->list_hour(), 'linked_account' => $linked_account, ] ) ;

    }

    private function list_hour() {

        $is_list_hour               = false ;

        $timezone                   = 'Africa/Johannesburg' ;


        $today_twelve               = Carbon::parse('today 12pm', $timezone) ;
        $today_one                  = Carbon::parse('today 1pm', $timezone) ;

        $tomorrow_twelve            = Carbon::parse('tomorrow 12pm', $timezone)->format('l jS F h:i:s A') ;
        $tomorrow_one               = Carbon::parse('tomorrow 1pm', $timezone)->format('l jS F h:i:s A') ;

        // Now
        $now                        = Carbon::now($timezone) ;

        if ($now->gte($today_twelve) && $now->lte($today_one)) {
            $is_list_hour = true ;
        }

        return [ 
            'today_twelve'          => $today_twelve, 
            'today_one'             => $today_one, 
            'tomorrow_twelve'       => $tomorrow_twelve, 
            'tomorrow_one'          => $tomorrow_one, 
            'is_list_hour'          => $is_list_hour, 
        ] ;

    }
}
