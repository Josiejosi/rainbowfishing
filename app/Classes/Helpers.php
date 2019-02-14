<?php

	namespace App\Classes ;

	use App\Notification ;

	use Notifications ;

	use Carbon\Carbon ;

	class Helpers {
	    
		
		public static function build( $title, $user_id ) {

			return [

				'title' 					=> $title,
				'notifications' 			=> Notifications::getUnRead( $user_id ),

			] ;

		}

		public static function slotTimeUpdate( $title, $user_id ) {

		}

		public static function getSlotTime() {

	        $early_list                 = false ;
	        $late_list                  = false ;

	        $twelve_string 				= '12pmm' ;
	        $one_string 				= '1pm' ;

	        $eight_string 				= '8pm' ;
	        $nine_string 				= '9pm' ;

	        $timezone                   = 'Africa/Johannesburg' ;

	        $today_twelve               = Carbon::parse( 'today ' . $twelve_string, $timezone ) ;
	        $today_one                  = Carbon::parse( 'today ' . $one_string, $timezone ) ;

	        $today_eight                = Carbon::parse( 'today ' . $eight_string, $timezone ) ;
	        $today_nine                 = Carbon::parse( 'today ' . $nine_string, $timezone ) ;

	        $early_list_start           = $today_twelve->format( 'd M h:i:s A' ) ;
	        $early_list_ends            = $today_one->format( 'd M h:i:s A' ) ;

	        $late_list_start            = $today_eight->format( 'd M h:i:s A' ) ;
	        $late_list_end              = $today_nine->format( 'd M h:i:s A' ) ;

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

	        //determate if is next list.
	        //
	        if ( $now->gte($today_one) ) {
		        $today_twelve           = Carbon::parse( 'tomorrow ' . $twelve_string, $timezone ) ;
		        $today_one              = Carbon::parse( 'tomorrow ' . $one_string, $timezone ) ;	        	
	        }

	        if ( $now->gte($today_nine) ) {
		        $today_eight           	= Carbon::parse( 'tomorrow ' . $eight_string, $timezone ) ;
		        $today_nine             = Carbon::parse( 'tomorrow ' . $nine_string, $timezone ) ;	        	
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