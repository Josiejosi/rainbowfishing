<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Split ;
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

    public function banking_details($order_id) {

    	$order = Orders::find( $order_id ) ;

    	return view( 'banking_details', [ 'order' => $order ] ) ;
    }

    
    public function reserve_member( Request $request) {

        $block_hours                        = 6 ;

        $order                              = Orders::find( $request->order_id ) ;

        if ( $order->status == 0 ) {
            if ( $request->amount < 50 ) {

                flash( "Please provide amounts between 50 and " . $order->amount )->error() ;
                return redirect()->back() ;
                
            }

            if ( $request->amount > 2000 ) {

                flash( "Please provide amounts between R 50 and R 2000" )->error() ;
                return redirect()->back() ;

            }

            if ( $request->amount > $order->amount ) {

                flash( "Please provide amounts between R 50 and R " . $order->amount  )->error() ;
                return redirect()->back() ;

            }

           // dd( $request->amount < $order->amount ) ;

            if ( $request->amount < $order->amount ) {
                
                if ( $request->amount >= 50 || $request->amount <= 2000 ) {


                    $new_order_amount       = $order->amount - $request->amount ;

                    if ( $new_order_amount > 50 ) {

                        $order->update( [ 'amount' => $new_order_amount, 'sender_id' => auth()->user()->id, ] ) ;

                        Split::create([

                            'status'        => 1, 
                            'amount'        => $request->amount, 
                            'receiver_id'   => $order->user_id , 
                            'sender_id'     => auth()->user()->id, 
                            'order_id'      => $order->id, 
                            'is_matured'    => 1, 
                            'matures_at'    => Carbon::now()->addHours($block_hours), 
                            'block_at'      => Carbon::now()->addHours($block_hours),
                            
                        ]) ;
                        
                    } else {

                        flash( "Remaining amount from split must be greater than R 50, You trying to leave R " . $new_order_amount )->error() ;
                        return redirect()->back() ;  

                    }

                } else {

                    flash( "Split amount must be between R 50 and R 2000" )->error() ;
                    return redirect()->back() ;

                }

            }

            if ( $order->amount == $request->amount ) {

                if ( $order->status == 0 ) {

                    $order->update( [ 'status' => '1', 'sender_id' => auth()->user()->id, 'block_at' => Carbon::now()->addHours($block_hours) ] ) ;

                    Notifications::create( "You reserved Order: RF00" . $request->order_id . ", Please make a payment in the next 6 hours.", $request->user_id ) ;
                    Notifications::create( "Your  Order: RF00" . $request->order_id . ", was reserved.", auth()->user()->id ) ;

                    flash( "You reserved <b>'Order: RF00" . $request->order_id . "'</b>, Please make a payment in the next 6 hours."  )->success() ;

                } else {

                    flash( "Member already reserved."  )->success() ;

                }
            }
        } else {
            flash( "Sorry, too late fish already taken."  )->error() ;
        }

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

        $maurity_time                  = 5 ;

    	$order                         = Orders::find( $order_id ) ;

    	$order->update( [ 'status' => '3' ] ) ;

    	$new_amount 				   = round( $order->amount + ( ( $order->amount * 30 ) / 100 ) ) ;

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

    public function send_payment( $order_id ) {

    	$order = Orders::find( $order_id ) ;

    	$order->update( [ 'status' => '2', ] ) ;

    	Notifications::create( "You just confirmed sending payment.", $order->sender_id ) ;
    	Notifications::create( "Your payment was send.", auth()->user()->id ) ;

        flash( "Confirmed sending payment."  )->success() ;

    	return redirect( '/home' ) ;

    }
}
