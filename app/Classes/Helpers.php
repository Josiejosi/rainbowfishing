<?php

	namespace App\Classes ;

	use App\Notification ;

	use Notifications ;

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

		}

	}