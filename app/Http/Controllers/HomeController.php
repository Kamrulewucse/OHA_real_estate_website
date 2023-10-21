<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\AboutPrincipal;
use App\Models\Category;
use App\Models\News;
use App\Models\Portfolio;
use App\Models\Project;
use App\Models\Team;
use App\Models\ClientQuery;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function contactUs()
    {
        return view('frontend.contact');
    }
    public function contactUsPost(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name'=>'required|max:100',
            'email'=>'required|email|max:200',
            'mobile_no'=>'required|digits:11',
            'location'=>'required|max:100',
            'approx_area'=>'required|max:100',
//            'subject'=>'required|max:255',
            'message'=>'required|max:500',
        ]);

        $query = new ClientQuery();
        $query->name = $request->name;
        $query->email = $request->email;
        $query->mobile_no = $request->mobile_no;
        $query->location = $request->location;
        $query->approx_area = $request->approx_area;
        $query->service = $request->service;
        $query->message = $request->message;
        $query->save();

//        return redirect()->route('home')
//        return redirect($request->input('redirect'));
//            ->with('message','Your message send successfully.');


//        Mail::to(['ctashiqkhan@gmail.com'])->send(new ContactUsMail($data));
//        Mail::to(['alvinrahul29@gmail.com'])->send(new ContactUsMail($data));

        return redirect()->route('contact_us')
            ->with('message','Your message send successfully.');
    }

    public function projects(){
        $projects = \App\Models\Project::with('category')->where('status', 1)->get();
        $categories = \App\Models\Category::where('status', 1)->get();
//        dd($categories);
        return view('frontend.project', compact('projects','categories'));
    }

    public function about(){
        $teams = TeamMember::orderBy('sort','asc')->get();

        return view('frontend.about', compact('teams','teams'));
    }

    public function news(){
        $newses = News::where('status', 1)->get();
        return view('frontend.news', compact('newses'));
    }

    public function newsDetails($slug)
    {
        $news = News::where('slug',$slug)->first();
        if (!$news)
            abort('404');

        return view('frontend.news_details',compact('news'));
    }

    public function portfolio()
    {

        $categories = Category::with('portfolios')
            ->orderBy('created_at','desc')
            ->where('status', 1)->get();

        $portfolios = Portfolio::with('category','project')->where('status', 1)->get();
        $locations = [];
        foreach ($portfolios as $portfolio){
            array_push($locations,[
                $portfolio->name,
                $portfolio->latitude,
                $portfolio->longitude,
            ]);
        }
        $locations = json_encode($locations);

        return view('frontend.portfolio', compact('categories','locations'));
    }

    public function projectDetails($slug) {
        $project = Project::with('images')->where('slug',$slug)->first();

        if(!$project)
            abort('404');


        // get Previous user id
        $getIdPrevious = Project::where('id', '<', $project->id)->max('id');
        $previous= Project::where('id',$getIdPrevious)->first();


        // get next user id
        $getIdNext = Project::where('id', '>', $project->id)->min('id');
        $next = Project::where('id',$getIdNext)->first();


        $socialLinks = \Share::page(route('project_details',['slug'=>$project->slug]),$project->name)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->telegram()
            ->getRawLinks();
//        dd($socialLinks);

        return view('frontend.project_details',compact('project','previous','next','getIdPrevious','getIdNext','socialLinks'));
    }
}
