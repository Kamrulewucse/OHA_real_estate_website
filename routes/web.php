<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\News;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = \App\Models\Project::with('category')->where('status', 1)->get();
    $categories = \App\Models\Category::where('status', 1)->get();
    $sliders = \App\Models\Slider::where('status',1)->orderBy('sort')->get();
    $newses = News::where('status', 1)->latest()->take(8)->get();
    $services = Service::where('status', 1)->take(6)->orderBy('sort')->get();
    $testimonials = Testimonial::where('status', 1)->take(6)->orderBy('sort')->get();
    $aboutUs = AboutUs::first();
    return view('frontend.home', compact('projects','categories',
    'sliders','newses','services','testimonials','aboutUs'));
})->name('home');
Route::get('projects',[HomeController::class,'projects'])->name('projects');
Route::get('project/{slug}',[\App\Http\Controllers\HomeController::class,'projectDetails'])->name('project_details');
Route::get('portfolio',[HomeController::class,'portfolio'])->name('portfolio');
Route::get('about',[HomeController::class,'about'])->name('about');
Route::get('news',[HomeController::class,'news'])->name('news');
Route::get('news-details/{slug}',[HomeController::class,'newsDetails'])->name('news_details');
Route::get('contact-us',[HomeController::class,'contactUs'])->name('contact_us');
Route::post('contact-us',[HomeController::class,'contactUsPost']);


Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth','verified'])
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/client-query', function () {

            $queries = \App\Models\ClientQuery::orderBy('created_at','desc')->get();
            return view('admin.client_query.queries',compact('queries'));
        })->name('client_query');

        // Slider
        Route::get('slider', [SliderController::class,'index'])->name('slider');
        Route::get('slider/add', [SliderController::class,'add'])->name('slider.add');
        Route::post('slider/add', [SliderController::class,'addPost']);
        Route::get('slider/edit/{slider}', [SliderController::class,'edit'])->name('slider.edit');
        Route::post('slider/edit/{slider}', [SliderController::class,'editPost']);
        Route::post('slider/delete', [SliderController::class,'delete'])->name('slider.delete');

        // About Us
        Route::get('about-us', [AboutController::class,'index'])->name('about_us');
        Route::get('about-us/add', [AboutController::class,'add'])->name('about_us.add');
        Route::post('about-us/add', [AboutController::class,'addPost']);
        Route::get('about-us/edit/{aboutUs}', [AboutController::class,'edit'])->name('about_us.edit');
        Route::post('about-us/edit/{aboutUs}', [AboutController::class,'editPost']);
        Route::post('about-us/delete', [AboutController::class,'delete'])->name('about_us.delete');


        // Project Category
        Route::get('project-project_category', [ProjectCategoryController::class,'index'])->name('project_category');
        Route::get('project-project_category/add', [ProjectCategoryController::class,'add'])->name('project_category.add');
        Route::post('project-project_category/add', [ProjectCategoryController::class,'addPost']);
        Route::get('project-project_category/edit/{projectCategory}', [ProjectCategoryController::class,'edit'])->name('project_category.edit');
        Route::post('project-project_category/edit/{projectCategory}', [ProjectCategoryController::class,'editPost']);
        Route::post('project-project_category/delete', [ProjectCategoryController::class,'delete'])->name('project_category.delete');

        // News Post
        Route::get('news', [NewsController::class,'index'])->name('news');
        Route::get('news/add', [NewsController::class,'add'])->name('news.add');
        Route::post('news/add', [NewsController::class,'addPost']);
        Route::get('news/edit/{news}', [NewsController::class,'edit'])->name('news.edit');
        Route::post('news/edit/{news}', [NewsController::class,'editPost']);
        Route::post('news/delete', [NewsController::class,'delete'])->name('news.delete');

        // Project
        Route::post('/project-image-upload', [ProjectController::class,'projectImageUploads'])->name('project_image_upload');
        Route::get('/project', [ProjectController::class,'index'])->name('project');
        Route::get('/project/add', [ProjectController::class,'add'])->name('add_project');
        Route::post('/project/add', [ProjectController::class,'addPost']);
        Route::get('/project/edit/{project}', [ProjectController::class,'edit'])->name('edit_project');
        Route::post('/project/edit/{project}', [ProjectController::class,'editPost']);
        Route::post('/project/delete', [ProjectController::class,'delete'])->name('delete_project');

        //Service
        Route::get('service',[ServiceController::class,'index'])->name('service');
        Route::get('service/create',[ServiceController::class,'create'])->name('service.create');
        Route::post('service/create',[ServiceController::class,'store']);
        Route::get('service/edit/{service}',[ServiceController::class,'edit'])->name('service.edit');
        Route::post('service/edit/{service}',[ServiceController::class,'update']);
        Route::post('service/destroy',[ServiceController::class,'destroy'])->name('service.destroy');
        //Testimonial
        Route::get('testimonial',[TestimonialController::class,'index'])->name('testimonial');
        Route::get('testimonial/create',[TestimonialController::class,'create'])->name('testimonial.create');
        Route::post('testimonial/create',[TestimonialController::class,'store']);
        Route::get('testimonial/edit/{testimonial}',[TestimonialController::class,'edit'])->name('testimonial.edit');
        Route::post('testimonial/edit/{testimonial}',[TestimonialController::class,'update']);
        Route::post('testimonial/destroy',[TestimonialController::class,'destroy'])->name('testimonial.destroy');

        //Portfolio

        Route::get('/portfolio', [PortfolioController::class,'index'])->name('portfolio');
        Route::get('/portfolio/add', [PortfolioController::class,'add'])->name('add_portfolio');
        Route::post('/portfolio/add', [PortfolioController::class,'addPost']);
        Route::get('/portfolio/edit/{portfolio}', [PortfolioController::class,'edit'])->name('edit_portfolio');
        Route::post('/portfolio/edit/{portfolio}', [PortfolioController::class,'editPost']);
        Route::post('/portfolio/delete-portfolio', [PortfolioController::class,'deletePortfolio'])->name('delete_portfolio');




        // Team Member
        Route::get('/team', [AboutController::class,'teamMember'])->name('team');
        Route::get('/member/add', [AboutController::class,'memberAdd'])->name('member_add');
        Route::post('/member/add', [AboutController::class,'memberAddPost']);
        Route::get('/member/edit/{team}', [AboutController::class,'memberEdit'])->name('team_edit');
        Route::post('/member/edit/{team}', [AboutController::class,'memberEditPost']);
        Route::post('/member/delete', [AboutController::class,'deleteMember'])->name('delete_team_member');

        //User password Change
        Route::get('password-change', [UserController::class,'passwordChange'])->name('password_change');
        Route::post('password-change', [UserController::class,'passwordChangePost']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
