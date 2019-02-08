<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User ;

use App\Classes\Notifications ;

class ProfileController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'password' ) ;

    }

    public function password_update( Request $request ) {

		$request->validate([

		    'password' 				=> 'required|min:6|confirmed',
		    
		]);

        $user 						= User::find( auth()->user()->id ) ;

        $user->update(['password' => Hash::make($request->password),]); 

        Notifications::create( "Password updated successfully.", $user->id ) ;

        flash( 'Password updated successfully.' )->success() ;
        return redirect()->back() ; 

    }
}
