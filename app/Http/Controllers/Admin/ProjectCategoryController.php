<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy('sort')->where('type',1)->get();

        return view('admin.project_category.all', compact('categories'));
    }

    public function add() {
        $maxSort = Category::where('type',1)->max('sort') + 1;
        return view('admin.project_category.add',compact('maxSort'));
    }

    public function addPost(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'sort' => 'required|integer|min:1',
            'status' => 'required'
        ]);

        $category = new Category();
        $category->type = 1;
        $category->name = $request->name;
        $category->slug = preg_replace('/\s+/', '-', strtolower($request->name));;
        $category->sort = $request->sort;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('admin.project_category')->with('message', 'Category add successfully.');
    }

    public function edit(Category $projectCategory) {
        return view('admin.project_category.edit', compact('projectCategory'));
    }

    public function editPost(Category $projectCategory, Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'sort' => 'required|integer|min:1',
            'status' => 'required'
        ]);

        $projectCategory->name = $request->name;
        $projectCategory->slug = preg_replace('/\s+/', '-', strtolower($request->name));;
        $projectCategory->sort = $request->sort;
        $projectCategory->status = $request->status;
        $projectCategory->save();

        return redirect()->route('admin.project_category')->with('message', 'Category edit successfully.');
    }
    public function delete(Request $request){
        $category = Category::find($request->id);
        $category->delete();
        return response()->json(['success' => true, 'message' => 'Successfully Deleted.']);
    }
}
