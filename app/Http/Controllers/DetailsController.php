<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Orders ;

use Carbon\Carbon ;

use App\Classes\Notifications ;

class DetailsController extends Controller
{
    public function __construct() { $this->middleware( 'auth' ) ; }

    public function index($order_id) {

    	$order = Orders::find( $order_id ) ;

    	return view( 'details', [ 'order' => $order ] ) ;
    }

    
    public function reserve_member( Request $request) {

        $order = Orders::find( $request->order_id ) ;

        $order->update( [ 'status' => '1', 'sender_id' => auth()->user()->id ] ) ;

        Notifications::create( "You reserved Order: RF00" . $request->order_id . ", Please make a payment in the next 3 hours.", $request->user_id ) ;
        Notifications::create( "Your  Order: RF00" . $request->order_id . ", was reserved.", auth()->user()->id ) ;

        flash( "You reserved <b>'Order: RF00" . $request->order_id . "'</b>, Please make a payment in the next 3 hours."  )->success() ;

        return redirect( '/home' ) ;

    }

    
    public function drop_order( Request $request) {

    	$order = Orders::find( $request->order_id ) ;

    	$order->update( [ 'status' => 0, 'sender_id' => '0', 'is_matured' => 0, ] ) ;

    	//Notifications::create( "You just drop this order RF00" . $request->order_id , $order->sender_id ) ;
    	//Notifications::create( "Your  Order: RF00" . $request->order_id . ", was drop, you now back on the fishing list.", auth()->user()->id ) ;

        flash( "You dropped <b>'Order: RF00" . $request->order_id . "'</b>"  )->success() ;

    	return redirect( '/home' ) ;

    }

    public function received_payment( $order_id ) {

    	$order = Orders::find( $order_id ) ;

    	$order->update( [ 'status' => '3' ] ) ;

    	$new_amount 				= $order->amount + ( $order->amount / 20 ) ;

    	$new_order 					= Orders::create([

    		'status'				=> 0, 
    		'amount'				=> $new_amount, 
    		'user_id'				=> $order->sender_id, 
    		'sender_id' 			=> 0, 
    		'is_matured' 			=> 1, 
    		'matures_at' 			=> Carbon::now()->addHours(5),

    	]) ;

    	Notifications::create( "Order approved.", $order->sender_id ) ;
    	Notifications::create( "Your just confirmed receiving.", auth()->user()->id ) ;

        flash( "Order complete."  )->success() ;

    	return redirect( '/home' ) ;

    }

    public function send_payment( $order_id ) {

    	$order = Orders::find( $order_id ) ;

    	$order->update( [ 'status' => '2', ] ) ;

    	Notifications::create( "You just confirmed sending payment.", $order->sender_id ) ;
    	Notifications::create( "Your payment was send.", auth()->user()->id ) ;

        flash( "Confirmed sending payment."  )->success() ;

    	return redirect( '/home' ) ;

    }
}
