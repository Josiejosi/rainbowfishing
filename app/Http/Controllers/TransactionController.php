<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Orders ;
use App\Classes\Helpers ;
use App\Classes\Notifications ;

use Carbon\Carbon ;

class TransactionController extends Controller {

    public function __construct() { $this->middleware('auth') ; }

    public function incoming() {

        return view( 'incoming' ) ;

    }

    public function outgoing() {

        return view( 'outgoing' ) ;

    }

}
