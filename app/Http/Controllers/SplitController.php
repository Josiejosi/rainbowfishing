<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Split ;
use App\Orders ;

use Carbon\Carbon ;

use App\Classes\Notifications ;

class SplitController extends Controller
{
    public function __construct() { $this->middleware( 'auth' ) ; }

    public function split_received_payment($order_id) {

        $maurity_time                  = 5 ;

    	$order                         = Split::find( $order_id ) ;

    	$order->update( [ 'status' => '3' ] ) ;

    	$new_amount 				   = round( $order->amount + ( $order->amount / 30 ) ) ;

        if ( $new_amount > 2000 ) {
 
            $new_order                  = Orders::create([

                'status'                => 0, 
                'amount'                => 2000, 
                'user_id'               => $order->sender_id, 
                'sender_id'             => 0, 
                'is_matured'            => 1, 
                'matures_at'            => Carbon::now()->addHours( $maurity_time ),
                'block_at'              => null,

            ]) ;

            $remaining_amount           = $new_amount - 2000 ;

            $new_order                  = Orders::create([

                'status'                => 0, 
                'amount'                => $remaining_amount, 
                'user_id'               => $order->sender_id, 
                'sender_id'             => 0, 
                'is_matured'            => 1, 
                'matures_at'            => Carbon::now()->addHours( $maurity_time ),
                'block_at'              => null,

            ]) ;

        } else {

        	$new_order 					= Orders::create([

        		'status'				=> 0, 
        		'amount'				=> $new_amount, 
        		'user_id'				=> $order->sender_id, 
        		'sender_id' 			=> 0, 
        		'is_matured' 			=> 1, 
                'matures_at'            => Carbon::now()->addHours( $maurity_time ),
        		'block_at' 			    => null,

        	]) ;

        }

    	Notifications::create( "Order approved.", $order->sender_id ) ;
    	Notifications::create( "Your just confirmed receiving.", auth()->user()->id ) ;

        flash( "Order complete."  )->success() ;

    	return redirect( '/home' ) ;
    }

    public function split_send_payment($order_id) {

    	$order = Split::find( $order_id ) ;

    	$order->update( [ 'status' => '2', ] ) ;

    	Notifications::create( "You just confirmed sending payment.", $order->sender_id ) ;
    	Notifications::create( "Your payment was send.", auth()->user()->id ) ;

        flash( "Confirmed sending payment."  )->success() ;

    	return redirect( '/home' ) ;
    }

    public function split_drop_payment($order_id) {
    	$split = Split::find( $order_id ) ;
    	$order = Orders::find( $split->order_id ) ;

    	$split_amount = $split->amount ;
    	$order_amount = $order->amount ;

    	$new_amount = $order_amount + $split_amount ;

    	$order->update( [ 'status' => 0, 'sender_id' => '0', 'is_matured' => 0, 'amount' => $new_amount ] ) ;

    	$split->delete() ;
        flash( "You dropped <b>'Order: RF00" . $split->order_id . "'</b>"  )->success() ;

    	return redirect( '/home' ) ;
    }
}
