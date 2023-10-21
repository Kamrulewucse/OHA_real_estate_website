<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort')->get();
        return view('admin.service.all',compact('services'));
    }

    public function create()
    {
        $maxSort = Service::max('sort') ?? 0;
        return view('admin.service.add',compact('maxSort'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'sort'=>'required|integer',
            'image'=>' nullable|mimes:jpg,jpeg,png,webp',
            'description'=>' required|max:50000',
            'status'=>' required',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')){
            // Upload Image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/service';
            $file->move($destinationPath, $filename);
            $imagePath = 'uploads/service/'.$filename;
            
             // Thumbs
            $img = Image::make($destinationPath.'/'.$filename);
            $img->resize(1800,1350);
            $img->save(public_path('uploads/service/'.$filename), 20);
            
        }

        $service = new Service();
        $service->name = $request->name;
        $service->sort = $request->sort;
        $service->image = $imagePath;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save();

        return redirect()->route('admin.service')
            ->with('message','Service created successfully');
    }
    public function edit(Service $service)
    {
        return view('admin.service.edit',compact('service'));
    }
    public function update(Service $service,Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'sort'=>'required|integer',
            'image'=>' nullable|mimes:jpg,jpeg,png,webp',
            'description'=>' nullable|max:50000',
            'status'=>' required',
        ]);
        if ($request->hasFile('image')){
            if (file_exists(($service->image))){
                unlink(public_path($service->image));
            }
            // Upload Image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/service';
            $file->move($destinationPath, $filename);
            
               // Thumbs
            $img = Image::make($destinationPath.'/'.$filename);
           $img->resize(1800,1350);
            $img->save(public_path('uploads/service/'.$filename), 20);
            
            
            $service->image = 'uploads/service/'.$filename;
            
           
        }


        $service->name = $request->name;
        $service->sort = $request->sort;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save();

        return redirect()->route('admin.service')
            ->with('message','Service updated successfully');
    }
    public function destroy(Request $request)
    {
        Service::find($request->id)->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Deleted successfully',
        ]);
    }
}
