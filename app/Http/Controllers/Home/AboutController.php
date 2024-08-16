<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class AboutController extends Controller
{
    public function edit()
    {
        $data = About::find(1);
        return view('admin.about.edit', compact('data'));
    } // end method

    public function update(Request $request)
    {
        $aboutId = $request->id;

        $notification = [];

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $saveLocation = 'uploads/about_images/' . $imageName;

            Image::read($image)->resize(523, 605)->save(public_path($saveLocation));

            About::findOrFail($aboutId)->update([
                'title' => $request->title,
                'info' => $request->info,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'image' => $saveLocation,
            ]);

            $notification = array(
                'message' => 'About Section Updated (With Image) Successfully',
                'alert-type' => 'success'
            );
        } else {
            About::findOrFail($aboutId)->update([
                'title' => $request->title,
                'info' => $request->info,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'About Section Updated (Without Image) Successfully',
                'alert-type' => 'info'
            );
        }

        return redirect()->back()->with($notification);
    } // end method

    public function index () {
        $aboutData = About::find(1);
        return view('frontend.about', compact('aboutData'));
    } // end method
}
