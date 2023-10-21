<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;

class NewsController extends Controller
{
    public function index() {

        $news = News::orderBy('posted_at','desc')->get();

        return view('admin.news.all', compact('news'));
    }

    public function add() {
        return view('admin.news.add');
    }

    public function addPost(Request $request) {



        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'post_date' => 'required|date',
            'post_time' => 'required',
            'description' => 'required|max:50000',
            'title' => 'required|max:255|unique:news',
            'author' => 'nullable|max:255',
            'status' => 'required',
        ]);
        $postedDateTime = $request->post_date.' '.$request->post_time;
        // Upload Image
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/news';
        $file->move($destinationPath, $filename);
        // Thumbs
        $img = Image::make($destinationPath.'/'.$filename);
        $img->resize(400,250);
        $img->save(public_path('uploads/news/thumbs/'.$filename), 50);
        $thumbsPath = 'uploads/news/thumbs/'.$filename;

        $img2 = Image::make($destinationPath.'/'.$filename);
        $img2->save(public_path('uploads/news/'.$filename), 50);
        $bigPath = 'uploads/news/'.$filename;

        $news = new News();
        $news->big_image = $bigPath;
        $news->thumbs_image = $thumbsPath;
        $news->posted_at = Carbon::parse($postedDateTime);
        $news->author = $request->author;
        $news->title = $request->title;
        $news->slug = preg_replace('/\s+/', '-', strtolower($request->title));
        $news->description = $request->description;
        $news->status = $request->status;
        $news->save();

        return redirect()->route('admin.news')->with('message', 'News add successfully.');
    }

    public function edit(News $news) {
        return view('admin.news.edit', compact('news'));
    }

    public function editPost(News $news, Request $request) {

        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'post_date' => 'required|date',
            'post_time' => 'required',
            'description' => 'required|max:50000',
            'title' => 'required|max:255|unique:news,id,'.$news->id,
            'author' => 'nullable|max:255',
            'status' => 'required',
        ]);
        if ($request->file('image')) {

            if(file_exists(public_path($news->big_image))){
                unlink(public_path($news->big_image));
            }
            if(file_exists(public_path($news->thumbs_image))){
                unlink(public_path($news->thumbs_image));
            }

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/news';
            $file->move($destinationPath, $filename);
            // Thumbs
            $img = Image::make($destinationPath.'/'.$filename);
            $img->resize(400,250);
            $img->save(public_path('uploads/news/thumbs/'.$filename), 50);
            $thumbsPath = 'uploads/news/thumbs/'.$filename;

            $img2 = Image::make($destinationPath.'/'.$filename);
            $img2->save(public_path('uploads/news/'.$filename), 50);
            $bigPath = 'uploads/news/'.$filename;

            $news->big_image = $bigPath;
            $news->thumbs_image = $thumbsPath;

        }
        $postedDateTime = $request->post_date.' '.$request->post_time;

        $news->posted_at = Carbon::parse($postedDateTime);
        $news->author = $request->author;
        $news->title = $request->title;
        $news->slug = preg_replace('/\s+/', '-', strtolower($request->title));
        $news->description = $request->description;
        $news->status = $request->status;
        $news->save();


        return redirect()->route('admin.news')->with('message', 'News update successfully.');
    }

    public function delete(Request $request) {
        $news = News::find($request->id);

        if(file_exists(public_path($news->big_image))){
            unlink(public_path($news->big_image));
        }
        if(file_exists(public_path($news->thumbs_image))){
            unlink(public_path($news->thumbs_image));
        }

        $news->delete();
        return response()->json(['success' => true, 'message' => 'Successfully Deleted.']);
    }
}
