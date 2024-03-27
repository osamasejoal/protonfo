<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{



    /*
    |--------------------------------------------------------------------------
    |                             INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $banner = Banner::get()->firstOrFail();
        return view('backend.banner.view', compact('banner'));
    }
    


    /*
    |--------------------------------------------------------------------------
    |                             UPDATE METHOD
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {

        $banner_data = Banner::find($id);

        // Validation Portion
        $request->validate([
            '*'                     => 'required',
            'title'                 => 'string | max:40',
            'image'                 => 'image|mimes:png,PNG',
            'feature_title_1'       => 'string|max:20',
            'feature_description_1' => 'string|max:100',
            'feature_title_2'       => 'string|max:20',
            'feature_description_2' => 'string|max:100',
            'feature_title_3'       => 'string|max:20',
            'feature_description_3' => 'string|max:100',
        ], [
            '*.required'                => 'This field is required',
            '*.string'                  => 'This field should be string',
            'title.max'                 => 'Maximum 40 values will be accepted',
            'feature_title_1.max'       => 'Maximum 20 values will be accepted',
            'feature_title_2.max'       => 'Maximum 20 values will be accepted',
            'feature_title_3.max'       => 'Maximum 20 values will be accepted',
            'feature_description_1.max' => 'Maximum 100 values will be accepted',
            'feature_description_2.max' => 'Maximum 100 values will be accepted',
            'feature_description_3.max' => 'Maximum 100 values will be accepted',
            'image.image'               => 'Please choose an image file',
            'image.mimes'               => "Only 'png' file is accepted",
        ]);

        // Image Update Portion
        if ($request->hasFile('image')) {

            if ($banner_data->image != 'defaul_banner.png') {
                unlink(base_path('public/backend/assets/images/banner/' . $banner_data->image));
            }

            $img = Image::make($request->image);
            $img_name = "Banner" . hexdec(uniqid()) . "." . $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/banner/' . $img_name));

            $banner_data->update([
                'image'         => $img_name,
            ]);
        }

        // Update Portion
        $banner_data->update([
            'title'                 => $request->title,
            'feature_title_1'       => $request->feature_title_1,
            'feature_title_2'       => $request->feature_title_2,
            'feature_title_3'       => $request->feature_title_3,
            'feature_description_1' => $request->feature_description_1,
            'feature_description_2' => $request->feature_description_2,
            'feature_description_3' => $request->feature_description_3,
            'updated_at'            => Carbon::now(),
        ]);

        return back()->with('success', 'Successfully updated your data');
    }
}
