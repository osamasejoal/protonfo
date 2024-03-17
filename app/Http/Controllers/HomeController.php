<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{   



    /*
    |--------------------------------------------------------------------------
    |                             __CONSTRUCT METHOD
    |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // End Method



    /*
    |--------------------------------------------------------------------------
    |                             INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index(){
        return view('backend.index');
    }
    //End Method
}
