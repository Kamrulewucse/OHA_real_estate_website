<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\ImageFile;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::orderBy('created_at','desc')->with('category')->get();
        return view('admin.project.all', compact('projects'));
    }

    public function add() {
        $categories = Category::orderBy('created_at','desc')->where('status', 1)->get();
        return view('admin.project.add', compact('categories'));
    }

    public function addPost(Request $request){
        // dd($request->all());
        $rules = [
            'category' => 'required',
            'name' => 'required|max:255|unique:projects',
            'description' => 'required|max:50000',
            'youtube_link' => 'nullable|max:555',
            'project_location_link' => 'nullable|max:2550',
            'image' => 'required|mimes:jpeg,jpg,png',
        ];
        $rules['status'] = 'required';
        $request->validate($rules);


        // Upload Image
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/project';
        $file->move($destinationPath, $filename);

        // Thumbs
        $img = Image::make($destinationPath.'/'.$filename);
        $img->resize(650,650);
        $img->save(public_path('uploads/project/'.$filename));
        $path = 'uploads/project/'.$filename;

        $project = new Project();
        $project->category_id = $request->category;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->feature_image = $path;
        $project->youtube_link = $request->youtube_link;
        $project->project_location_link = $request->project_location_link;
        $project->slug = preg_replace('/\s+/', '-', strtolower($request->name));
        $project->status = $request->status;
        $project->save();





        if ($request->imagesId) {

            for ($i = 0; $i < sizeof($request->imagesId); $i++) {
                $image = ProjectImage::where('id', $request->imagesId[$i])->first();

                $filename = Uuid::uuid1()->toString();
                $ext = pathinfo($image->path, PATHINFO_EXTENSION);

                $thumbsSavePath = 'uploads/project_image/thumbs/' . $filename . '.' . $ext;

                // Thumbs Image
                $thumb = Image::make(public_path($image->path));
                $thumb->save(public_path($thumbsSavePath));

                $image->project_id = $project->id;
                $image->sort = $i + 1;
                $image->thumbs_image = $thumbsSavePath;
                $image->save();
            }
        }

        return redirect()->route('admin.project')->with('message', 'Project add successfully.');
    }

    public function edit(Project $project) {
        $categories = Category::where('status', 1)->get();
        return view('admin.project.edit', compact('project','categories'));
    }

    public function editPost(Project $project, Request $request){
        $rules = [
            'category' => 'required',
            'name' => 'required|max:255|unique:projects,id,'.$project->id,
            'description' => 'required|max:50000',
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'youtube_link' => 'nullable|max:555',
            'project_location_link' => 'nullable|max:2550',
            'imagesId' => 'required',
        ];
        $rules['status'] = 'required';
        $request->validate($rules);

        if ($request->image) {
            if (file_exists('public/'.$project->feature_image)){
                unlink('public/'.$project->feature_image);
            }

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/project';
            $file->move($destinationPath, $filename);

            $project->feature_image ='uploads/project/'.$filename;
            // Thumbs
            $img = Image::make($destinationPath.'/'.$filename);
            $img->resize(650,650);
            $img->save(public_path('uploads/project/'.$filename));

        }

        $project->category_id = $request->category;
        $project->name = $request->name;
        $project->youtube_link = $request->youtube_link;
        $project->project_location_link = $request->project_location_link;
        $project->description = $request->description;
        $project->slug = preg_replace('/\s+/', '-', strtolower($request->name));
        $project->save();
        if ($request->imagesId) {


            for ($i = 0; $i < sizeof($request->imagesId); $i++) {
                $image = ProjectImage::where('id', $request->imagesId[$i])->first();

                if ($image->project_id == null || $image->thumbs_image == null) {

                    $filename = Uuid::uuid1()->toString();
                    $ext = pathinfo($image->path, PATHINFO_EXTENSION);

                    $thumbsSavePath = 'uploads/project_image/thumbs/' . $filename . '.' . $ext;

                    // Thumbs Image
                    $thumb = Image::make(public_path($image->path));
                    $thumb->save(public_path($thumbsSavePath));



                    $image->thumbs_image = $thumbsSavePath;
                }

                $image->project_id = $project->id;
                $image->sort = $i + 1;
                $image->save();
            }

            // Delete Images
            $images = ProjectImage::where('project_id', $project->id)
                ->whereNotIn('id', $request->imagesId)
                ->get();

            foreach ($images as $image) {
                if ($image->path != null)
                    unlink(public_path($image->path));

                if ($image->thumbs != null)
                    unlink(public_path($image->thumbs));

                $image->delete();
            }
        }

        return redirect()->route('admin.project')->with('message', 'Project update successfully.');
    }

    public function delete(Request $request) {
        $project = Project::find($request->id);
        unlink('public/'.$project->feature_image);
        $project->delete();
        return response()->json(['success' => true, 'message' => 'Successfully Deleted.']);
    }

    public function projectImageUploads(Request $request) {
        // dd($request->all());
        $request->validate([
            'file' => 'required|image'
        ]);

        $file = $request->file('file');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/project_image';
        $file->move($destinationPath, $filename);
        $path = 'uploads/project_image/'.$filename;
         //full path
            $fullImage = Image::make($destinationPath.'/'.$filename);

            $fullImage->save(public_path('uploads/project_image/'.$filename));

        $image = ProjectImage::create([
            'path' => $path,
            'big_image' => $path,
        ]);
        $image->fullPath = asset($path);

        return response()->json(['success' => true, 'data' => $image->toArray()]);
    }
}
