<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'admins' ) ;

    }

    public function orders() {

        return view( 'orders' ) ;

    }

    public function users() {

        return view( 'users' ) ;

    }
}
