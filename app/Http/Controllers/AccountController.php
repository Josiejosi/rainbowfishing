<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account ;

use App\Classes\Notifications ;

class AccountController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'account' ) ;

    }

    public function account_update( Request $request ) {

		$request->validate([

		    'bank' 						=> 'required',
		    'account_holder' 			=> 'required',
		    'account_number' 			=> 'required',
		    
		]); 


    	if ( Account::where( 'user_id', auth()->user()->id )->count() == 1 ) {

    		Account::where( 'user_id', auth()->user()->id )->update([

	    		'bank'					=> $request->bank, 
	    		'account_holder' 		=> $request->account_holder, 
	    		'account_number' 		=> $request->account_number, 
	    		'branch_code' 			=> isset( $request->branch_code ) ? $request->branch_code : '', 
	    		'branch_number' 		=> isset( $request->branch_number ) ? $request->branch_number : '', 

    		]) ;

    		Notifications::create( "You added new banking details", auth()->user()->id ) ;

    	} else {

	    	$account 					= Account::create([

	    		'bank'					=> $request->bank, 
	    		'account_holder' 		=> $request->account_holder, 
	    		'account_number' 		=> $request->account_number, 
	    		'branch_code' 			=> isset( $request->branch_code ) ? $request->branch_code : '', 
	    		'branch_number' 		=> isset( $request->branch_number ) ? $request->branch_number : '', 
	    		'user_id'				=> auth()->user()->id,

	    	]) ;

	    	Notifications::create( "You have updated your banking details.", auth()->user()->id ) ;
	    	
    	}


        flash( 'Account updated successfully' )->success() ;
        return redirect()->back() ;
    }
    
}
