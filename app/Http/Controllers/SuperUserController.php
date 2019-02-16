<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\User ;
use App\Split ;
use App\Orders ;
use App\Classes\Helpers ;
use App\Classes\Notifications ;

use Carbon\Carbon ;

use App\Jobs\ProcessUserRegisteredEmail ;

class SuperUserController extends Controller
{

    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'super' ) ;

    }

    public function orders() {

    	$user 						= User::where( 'role', 3 )->get() ;

        return view( 'super_orders', ['users' => $user ] ) ;

    }

    public function admin_registration( Request $request ) {

		$request->validate([

            'name'                  => 'required',
		    'phone_number' 			=> 'required',
		    'email' 				=> 'required|unique:users|max:255',
		    'password' 				=> 'required|min:6|confirmed',
		    
		]); 

        $user 						= User::create([

            'name'                  => $request->name,
            'phone_number'          => $request->phone_number,
            'email'             	=> $request->email,
            'password'          	=> Hash::make($request->password),
            'role'              	=> 3, 
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

         	flash( "New order for ".$user->name." was added successfully." )->success() ;
        } else {
        	flash('Problem create the admin account.')->error() ;
        }

        return redirect()->back() ;

    }
}
