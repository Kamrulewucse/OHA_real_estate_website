<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tracker;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalVisitor = Tracker::count();
        $todayVisitor = Tracker::where('visit_date',date('Y-m-d'))->count();

        return view('admin.dashboard',compact('todayVisitor','totalVisitor'));
    }
}
