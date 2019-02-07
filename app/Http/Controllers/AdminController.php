<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User ;
use App\Orders ;
use App\Classes\Helpers ;
use App\Classes\Notifications ;

use Carbon\Carbon ;

use App\Jobs\ProcessUserRegisteredEmail ;

class AdminController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'admins' ) ;

    }

    public function admin_registration( Request $request ) {

		$request->validate([

		    'name' 					=> 'required',
		    'email' 				=> 'required|unique:users|max:255',
		    'password' 				=> 'required|min:6|confirmed',
		    
		]); 

        $user 						= User::create([

            'name'              	=> $request->name,
            'email'             	=> $request->email,
            'password'          	=> Hash::make($request->password),
            'role'              	=> 2, 
            'is_active'         	=> 1, 
            'is_blocked'        	=> 0,

        ]);  


        if ( $user ) {

        	Notifications::create( "Your admin account was created successfully", $user->id ) ;

        	ProcessUserRegisteredEmail::dispatch( $user, $request->password )->onQueue( 'rainbow-fishing' ) ;

         	flash( 'Account created successfully.' )->success() ;
        } else {
        	flash('Problem create the admin account.')->error() ;
        }

        return redirect()->back() ;

    }

    public function orders() {

    	$user 						= User::where( 'role', 2 )->get() ;

        return view( 'orders', ['users' => $user ] ) ;

    }

    public function admin_orders( Request $request ) {

    	$user 						= User::find( $request->admin_id ) ;

    	$new_order 					= Orders::create([

    		'status'				=> 0, 
    		'amount'				=> $request->amount, 
    		'user_id'				=> $request->admin_id, 
    		'sender_id' 			=> 0, 
    		'is_matured' 			=> 1, 
    		'matures_at' 			=> Carbon::now(),

    	]) ;

        if ( $user ) {

        	Notifications::create( "New order for ".$user->name." was added successfully.", $user->id ) ;

         	flash( 'Account created successfully.' )->success() ;
        } else {
        	flash('Problem create the admin account.')->error() ;
        }

        return redirect()->back() ;

    }

    public function users() {

    	$user 						= User::where( 'role', 1 )->get() ;

        return view( 'users', [ 'users' => $user ]  ) ;

    }

    public function block_user($user_id) {

    	$user 						= User::find( $user_id ) ;

    	$user->update(['is_blocked'=>0]) ;

        flash( $user->name . ' account blocked.' )->success() ;
        return redirect()->back() ;

    }

    public function unblock_user($user_id) {

    	$user 						= User::find( $user_id ) ;
    	$user->update(['is_blocked'=>1]) ;
        flash( $user->name . ' account unblocked.' )->success() ;
        return redirect()->back() ;

    }

    public function activate_user($user_id) {

    	$user 						= User::find( $user_id ) ;
    	$user->update(['is_active'=>1]) ;
        flash( $user->name . ' account activated.' )->success() ;
        return redirect()->back() ;

    }
}
