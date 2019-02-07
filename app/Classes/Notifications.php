<?php

	namespace App\Classes ;

	use App\Notification ;

	class Notifications {
	    
		public static function create( $message, $user_id ) {

			$notification 				= Notification::create([

				'message'				=> $message, 
				'is_viewed' 			=> 0, 
				'user_id' 				=> $user_id,

			]) ; 

			

			if ( $notification ) {
				return true ;
			} else {
				return false ;
			}

		}
	    
		public static function getUnRead( $user_id ) {

			return [ 'notifications' 	=> Notification::where( 'is_viewed', 0 )->where( 'user_id', $user_id )->get() ] ;

		}
	    
		public static function getRead( $user_id ) {

			return [ 'notifications' 	=> Notification::where( 'is_viewed', 1 )->where( 'user_id', $user_id )->get() ] ;

		}
	    
		public static function getAllNotifications( $user_id ) {

			return [ 'notifications' 	=> Notification::where( 'user_id', $user_id )->get() ] ;

		}
	    
		public static function markAsRead( $id, $user_id ) {

			if ( Notification::find( 'user_id', $user_id )->update( [ 'is_viewed', 1 ] ) ) {
				return true ;
			} else {
				return false ;
			}

		}

	}