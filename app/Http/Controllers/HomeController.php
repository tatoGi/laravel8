<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use Auth;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function Homslider(){
        $sliders = slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function AddSlider(){
        return view('admin.slider.create');
    }


public function StoreSlider( request $request){
    $slider_image = $request->file('image');

    $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
    Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
    $last_img = 'image/slider/'.$name_gen;

    Slider::insert([
        'title' => $request-> title,
        'description' => $request-> description,
        'image' => $last_img,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('home.slider')->with('success', 'Slider Inserted Successfully');

}


}
