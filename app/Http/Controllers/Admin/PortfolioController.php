<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(){
        $portfolios = Portfolio::orderBy('created_at','desc')->with('category')->get();
        return view('admin.portfolio.all', compact('portfolios'));
    }

    public function add(){
        $projects = Project::orderBy('created_at','desc')->where('status', 1)->get();
        $categories = Category::orderBy('created_at','desc')->where('status', 1)->get();
        return view('admin.portfolio.add', compact('categories','projects'));
    }
    public function addPost(Request $request){
        $rules = [
            'type' => 'nullable',
            'category' => 'required',
            'project' => 'required',
            'name' => 'required|max:255|unique:portfolios',
            'address' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
        $rules['status'] = 'required';
        $request->validate($rules);

        $portfolio = new Portfolio();
        $portfolio->type = $request->type;
        $portfolio->project_id = $request->project;
        $portfolio->category_id = $request->category;
        $portfolio->name = $request->name;
        $portfolio->address = $request->address;
        $portfolio->latitude = $request->latitude;
        $portfolio->longitude = $request->longitude;
        $portfolio->status = $request->status;
        $portfolio->save();

        return redirect()->route('admin.portfolio')->with('message', 'Portfolio add successfully.');
    }

    public function edit(Portfolio $portfolio){
        $projects = Project::orderBy('created_at','desc')->where('status', 1)->get();
        $categories = Category::orderBy('created_at','desc')->where('status', 1)->get();
        return view('admin.portfolio.edit', compact('portfolio','categories',
        'projects'));
    }

    public function editPost(Portfolio $portfolio, Request $request){
        $rules = [
            'type' => 'nullable',
            'project' => 'required',
            'category' => 'required',
            'name' => 'required|max:255|unique:projects,id,'.$portfolio->id,
            'address' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
        $rules['status'] = 'required';
        $request->validate($rules);

        $portfolio->type = $request->type;
        $portfolio->project_id = $request->project;
        $portfolio->category_id = $request->category;
        $portfolio->name = $request->name;
        $portfolio->address = $request->address;
        $portfolio->latitude = $request->latitude;
        $portfolio->longitude = $request->longitude;
        $portfolio->status = $request->status;
        $portfolio->save();

        return redirect()->route('admin.portfolio')->with('message', 'Portfolio add successfully.');
    }

    public function deletePortfolio(Request $request) {
        $portfolio = Portfolio::find($request->id);
        $portfolio->delete();
        return response()->json(['success' => true, 'message' => 'Successfully Deleted.']);
    }
}
