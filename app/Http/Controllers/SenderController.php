<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;

class SenderController extends Controller
{
    public function __construct() { $this->middleware( 'auth' ) ; }

    public function index($user_id, $amount) {

        $user = User::find( $user_id ) ;

        return view( 'sender_details', [ 'user' => $user, 'amount' => $amount ] ) ;
    }  
}
