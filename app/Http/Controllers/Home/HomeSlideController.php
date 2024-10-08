<?php

namespace App\Http\Controllers\Home;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class HomeSlideController extends Controller
{
    public function Home()
    {
        $homeSlideData = HomeSlide::find(1);
        return view('admin.home_slide.index', compact('homeSlideData'));
    }

    public function Update(Request $request)
    {
        $slideId = $request->id;

        $notification = [];

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $saveLocation = 'uploads/home_slide_images/' . $imageName;

            Image::read($image)->resize(636, 852)->save(public_path($saveLocation));

            HomeSlide::findOrFail($slideId)->update([
                'title' => $request->title,
                'description' => $request->description,
                'video_url' => $request->video_url,
                'image' => $saveLocation,
            ]);

            $notification = array(
                'message' => 'Home Slider Updated (With Image) Successfully',
                'alert-type' => 'success'
            );
        } 
        
        else {
            HomeSlide::findOrFail($slideId)->update([
                'title' => $request->title,
                'description' => $request->description,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slider Updated (Without Image) Successfully',
                'alert-type' => 'info'
            );
        }

        return redirect()->back()->with($notification);
    }
}
