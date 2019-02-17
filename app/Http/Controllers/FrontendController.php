<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {

    	return redirect('/login') ;
    	
    }

    public function blocked() {

    	return view('auth.blocked') ;
    	
    }
}
