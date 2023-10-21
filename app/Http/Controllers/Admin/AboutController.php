<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\TeamMember;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;

class AboutController extends Controller
{
    //Team Member
    public function teamMember(){
        $teams = TeamMember::orderBy('sort','asc')->get();
        return view('admin.team.all', compact('teams'));
    }

    public function memberAdd(){
        $maxSort = TeamMember::max('sort');
        return view('admin.team.add',compact('maxSort'));
    }

    public function memberAddPost(Request $request) {
//        dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        // Upload Image
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/team';
        $file->move($destinationPath, $filename);

        // Thumbs
        $img = Image::make($destinationPath.'/'.$filename);
        $img->resize(531, 650);
        $img->save(public_path('uploads/team/'.$filename), 50);
        $path = 'uploads/team/'.$filename;

        $teamMember = new TeamMember();
        $teamMember->sort = $request->sort;
        $teamMember->name = $request->name;
        $teamMember->designation = $request->designation;
        $teamMember->image = $path;
        $teamMember->save();


        return redirect()->route('admin.team')->with('message', 'Team member add successfully.');
    }

    public function memberEdit(TeamMember $team) {
        return view('admin.team.edit', compact('team'));
    }

    public function memberEditPost(TeamMember $team, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,jpg,png',
        ]);
        $team->sort = $request->sort;
        $team->name = $request->name;
        $team->designation = $request->designation;

        // Update image if exists
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/team';
            $file->move($destinationPath, $filename);
            // Thumbs
            $img = Image::make($destinationPath.'/'.$filename);
            $img->resize(531, 650);
            $img->save(public_path('uploads/team/'.$filename), 50);
            $team->image = 'uploads/team/'.$filename;
        }
        $team->save();


        return redirect()->route('admin.team')->with('message', 'Team member update successfully.');
    }

    public function deleteMember(Request $request) {
        $team = TeamMember::find($request->id);

        $imagePath = public_path($team->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $team->delete();

        return response()->json(['success' => true, 'message' => 'Successfully Deleted.']);
    }

    public function index() {

        $aboutUs = AboutUs::get();

        return view('admin.about_us.all', compact('aboutUs'));
    }

    public function add() {
        return view('admin.about_us.add');
    }

    public function addPost(Request $request) {



        $request->validate([
            'description' => 'required|max:50000',
            'image' => 'required|mimes:jpeg,jpg,png',
            'status' => 'required',
        ]);
        // Upload Image
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/about_us';
        $file->move($destinationPath, $filename);
        // Thumbs
        $img = Image::make($destinationPath.'/'.$filename);
        $img->resize(400,250);
        $img->save(public_path('uploads/about_us/thumbs/'.$filename), 50);
        $thumbsPath = 'uploads/about_us/thumbs/'.$filename;

        $img2 = Image::make($destinationPath.'/'.$filename);
        $img2->save(public_path('uploads/about_us/'.$filename), 50);
        $bigPath = 'uploads/about_us/'.$filename;

        $aboutUs = new AboutUs();
        $aboutUs->image = $bigPath;
        $aboutUs->thumbs_image = $thumbsPath;
        $aboutUs->description = $request->description;
        $aboutUs->status = $request->status;
        $aboutUs->save();

        return redirect()->route('admin.about_us')->with('message', 'AboutUs add successfully.');
    }

    public function edit(AboutUs $aboutUs) {
        return view('admin.about_us.edit', compact('aboutUs'));
    }

    public function editPost(AboutUs $aboutUs, Request $request) {

        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'description' => 'required|max:50000',
            'status' => 'required',
        ]);
        if ($request->file('image')) {

            if(file_exists(public_path($aboutUs->image))){
                unlink(public_path($aboutUs->image));
            }
            if(file_exists(public_path($aboutUs->thumbs_image))){
                unlink(public_path($aboutUs->thumbs_image));
            }

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/about_us';
            $file->move($destinationPath, $filename);
            // Thumbs
            $img = Image::make($destinationPath.'/'.$filename);
            $img->resize(400,250);
            $img->save(public_path('uploads/about_us/thumbs/'.$filename), 50);
            $thumbsPath = 'uploads/about_us/thumbs/'.$filename;

            $img2 = Image::make($destinationPath.'/'.$filename);
            $img2->save(public_path('uploads/about_us/'.$filename), 50);
            $bigPath = 'uploads/about_us/'.$filename;

            $aboutUs->image = $bigPath;
            $aboutUs->thumbs_image = $thumbsPath;

        }

        $aboutUs->description = $request->description;
        $aboutUs->status = $request->status;
        $aboutUs->save();


        return redirect()->route('admin.about_us')->with('message', 'AboutUs update successfully.');
    }

    public function delete(Request $request) {
        $aboutUs = AboutUs::find($request->id);

        if(file_exists(public_path($aboutUs->image))){
            unlink(public_path($aboutUs->image));
        }
        if(file_exists(public_path($aboutUs->thumbs_image))){
            unlink(public_path($aboutUs->thumbs_image));
        }

        $aboutUs->delete();
        return response()->json(['success' => true, 'message' => 'Successfully Deleted.']);
    }

}
