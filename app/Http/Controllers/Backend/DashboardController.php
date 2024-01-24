<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function dashboard()
    {
        Gate::authorize('app.dashboard');
        $breadcrumb = ['Dashboard' => ''];
        setThisPageTitle('Dashboard');
        return view('backend.pages.dashboard.dashboard', compact('breadcrumb'));
    }
}
