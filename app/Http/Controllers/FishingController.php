<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon ;

use App\Orders ;
use App\User ;

use App\Classes\Helpers ;

class FishingController extends Controller
{
    public function __construct() { $this->middleware( 'auth' ) ; $this->middleware( 'blocked' ) ; }

    public function index() {

        $linked_account             = false ;

        if ( auth()->user()->account != null ) {

            $linked_account         = true ;
            
        }

        $orders                     = Orders::where( 'matures_at', '<', Carbon::now() )
                                             ->where( 'status', 0 )
                                             ->where( 'user_id', '<>', auth()->user()->id )
                                             ->orderBy('matures_at', 'desc')->take(15)
                                             ->get() ;

        $outgoing                   = Orders::where( 'sender_id', auth()->user()->id )
                                            ->where( 'status','<>', 0 )
                                            ->orderBy('updated_at', 'desc')
                                            ->take(5)
                                            ->get() ;

        return view( 'fishing', [

            'list_hour'             => Helpers::getSlotTime(), 
            'linked_account'        => $linked_account,  
            'orders'                => $orders, 
            'outgoing'              => $outgoing,

        ]) ;

    }

}
