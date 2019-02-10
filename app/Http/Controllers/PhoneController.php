<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Classes\Notifications ;

class PhoneController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'phone' ) ;

    }

    public function phone_update( Request $request ) {

		$request->validate([

		    'phone_number' 				=> 'required',
		    
		]);

    	if ( User::where( 'id', auth()->user()->id )->count() == 1 ) {

    		User::where( 'id', auth()->user()->id )->update([

	    		'phone_number'			=> $request->phone_number,

    		]) ;

    		Notifications::create( "You added a phone number", auth()->user()->id ) ;

    	} 


        flash( 'You added a phone number' )->success() ;
        return redirect()->back() ;

    }
}
