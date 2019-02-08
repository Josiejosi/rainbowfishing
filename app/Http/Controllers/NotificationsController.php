<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notification ;

use App\Classes\Notifications ;

class NotificationsController extends Controller
{

    public function index() {

    	return view( 'notifications', [ 'notifications' => Notifications::getAllNotifications( auth()->user()->id ) ] ) ;

    }

    public function notification_markasread( $notification_id ) {

    	if ( Notifications::markRead( $notification_id ) ) {
         	flash( 'Notification read.' )->success() ;
        }

    	return redirect( '/notifications' ) ;

    }
}
