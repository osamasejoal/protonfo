<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class FrontendController extends Controller
{



    /*
    |--------------------------------------------------------------------------
    |                            FRONTPAGE METHOD
    |--------------------------------------------------------------------------
    */
    public function frontpage(){
        $banner = Banner::firstOrFail();
        return view('frontend.index', compact('banner'));
    }
    //End Method
}
