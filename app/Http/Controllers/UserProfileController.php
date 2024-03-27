<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{



    /*
    |--------------------------------------------------------------------------
    |                             INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('backend.profile.view');
    }
    // End Method



    /*
    |--------------------------------------------------------------------------
    |                             UPDATE METHOD
    |--------------------------------------------------------------------------
    */
    public function update(Request $request)
    {

        // Validation Portion
        $request->validate([
            'name'      => 'required',
            'gender'    => 'required | integer',
            'image'     => 'image | mimes:png,jpg,jpeg',
        ], [
            'name.required'     => 'Name is required',
            'gender.required'   => 'Gender is required',
            'gender.ineger'     => 'Please enter a valid gender',
            'image.image'       => 'Please choose a image file',
            'image.mimes'       => 'Only png, jpg & jpeg file will allowed',
        ]);

        // Image Update Portion
        if ($request->hasFile('image')) {

            if (auth()->user()->image != 'default.png') {
                unlink(base_path('public/backend/assets/images/profile/' . auth()->user()->image));
            }

            $img = Image::make($request->image);
            $img_name = date('YmdHi') . hexdec(uniqid()) . "." . $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/profile/' . $img_name));

            User::find(auth()->id())->update([
                'image'         => $img_name,
            ]);
        }

        // Update Portion
        User::find(auth()->id())->update([
            'name'          => $request->name,
            'gender'        => $request->gender,
            'updated_at'    => Carbon::now(),
        ]);

        return back()->with('success', "Successfully updated your data");
    }
    // End Method



    /*
    |--------------------------------------------------------------------------
    |                             UPDATE PASSWORD METHOD
    |--------------------------------------------------------------------------
    */
    public function updatePass(Request $request){
        // Validation Portion
        $request->validate([
            'old_pass'              => 'required',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required',
        ],[
            '*.required'    => "This field is required",
            '*.confirmed'   => "Confirm password does not match",
        ]);

        // Match the old password
        if (!Hash::check($request->old_pass, auth()->user()->password)) {
            return back()->with('error', "Old password does not match");
        }

        // Update new password
        User::whereId(auth()->id())->update([
            'password' => Hash::make($request->password),
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Successfully updated your password');
    }
    // End Method
}
