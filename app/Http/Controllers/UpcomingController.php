<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Orders ;
use Carbon\Carbon ;

class UpcomingController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        
        $orders                     = Orders::where( 'matures_at', '>', Carbon::now() )
                                             ->where( 'status', 0 )
                                             ->where( 'user_id', auth()->user()->id )
                                             ->get() ;

        return view( 'upcoming', [ 'orders' => $orders ] ) ;

    }
}
