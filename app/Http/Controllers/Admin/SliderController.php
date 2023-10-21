<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Cohensive\OEmbed\OEmbed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;
use File;

class SliderController extends Controller
{
    public function index() {
        $sliders = Slider::orderBy('sort')->get();

        return view('admin.slider.all', compact('sliders'));
    }

    public function add() {
        $maxSort = Slider::max('sort');
        return view('admin.slider.add',compact('maxSort'));

    }

    public function addPost(Request $request) {


        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,mp4',
            'title' => 'nullable|max:255',
            'sub_title' => 'nullable|max:255',
            'sort' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        // Upload Image
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/slider';
        $file->move($destinationPath, $filename);
        if(strtolower(pathinfo($filename, PATHINFO_EXTENSION)) != 'mp4') {
            // Thumbs
            $img = Image::make($destinationPath . '/' . $filename);
            $img->resize(1920, 1080);
            $img->save(public_path('uploads/slider/' . $filename), 40);

        }
        $path = 'uploads/slider/' . $filename;

        $slider = new Slider();
        $slider->image = $path;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->sort = $request->sort;
        $slider->status = $request->status;
        $slider->save();

        return redirect()->route('admin.slider')->with('message', 'Slider add successfully.');
    }

    public function edit(Slider $slider) {
        return view('admin.slider.edit', compact('slider'));
    }

    public function editPost(Slider $slider, Request $request) {

        $messages = [
            'image.dimensions' => 'The image dimension should be 1920x1080 px',
        ];
        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png|mp4',
            'title' => 'nullable|max:255',
            'sub_title' => 'nullable',
            'sort' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        if ($request->image) {

            if(File::exists(public_path($slider->image))){
                File::delete(public_path($slider->image));
            }

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/slider';
            $file->move($destinationPath, $filename);

            $slider->image ='uploads/slider/'.$filename;
            if(strtolower(pathinfo($filename, PATHINFO_EXTENSION)) != 'mp4'){
                // Thumbs
                $img = Image::make($destinationPath.'/'.$filename);
                $img->resize(1920,1080);
                $img->save(public_path('uploads/slider/'.$filename), 40);
            }


        }

        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->sort = $request->sort;
        $slider->status = $request->status;
        $slider->save();

        return redirect()->route('admin.slider')->with('message', 'Slider update successfully.');
    }

    public function delete(Request $request) {
        $slider = Slider::find($request->id);

        if(File::exists(public_path($slider->image))){
            File::delete(public_path($slider->image));
        }
        $slider->delete();
    }
}
