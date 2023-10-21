<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort')->get();
        return view('admin.testimonial.all',compact('testimonials'));
    }

    public function create()
    {
        $maxSort = Testimonial::max('sort') ?? 0;
        return view('admin.testimonial.add',compact('maxSort'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'designation'=>'required|max:255',
            'sort'=>'required|integer',
            'image'=>' required|mimes:jpg,jpeg,png,webp',
            'feedback'=>' nullable|max:300',
            'status'=>' required',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')){
            // Upload Image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/testimonial';
            $file->move($destinationPath, $filename);
            $imagePath = 'uploads/testimonial/'.$filename;
        }

        $testimonial = new Testimonial();
        $testimonial->image = $imagePath;
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->sort = $request->sort;
        $testimonial->feedback = $request->feedback;
        $testimonial->status = $request->status;
        $testimonial->save();

        return redirect()->route('admin.testimonial')
            ->with('message','Testimonial created successfully');
    }
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit',compact('testimonial'));
    }
    public function update(Testimonial $testimonial,Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'designation'=>'required|max:255',
            'image'=>' nullable|mimes:jpg,jpeg,png,webp',
            'feedback'=>' nullable|max:300',
            'status'=>' required',
        ]);
        if ($request->hasFile('image')){
            if (file_exists(public_path($testimonial->image))){
                unlink(public_path($testimonial->image));
            }
            // Upload Image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/testimonial';
            $file->move($destinationPath, $filename);
            $testimonial->image = 'uploads/testimonial/'.$filename;
        }


        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->sort = $request->sort;
        $testimonial->feedback = $request->feedback;
        $testimonial->status = $request->status;
        $testimonial->save();

        return redirect()->route('admin.testimonial')
            ->with('message','Testimonial updated successfully');
    }
    public function destroy(Request $request)
    {
        Testimonial::find($request->id)->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Deleted successfully',
        ]);
    }
}
