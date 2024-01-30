<?php

namespace App\Http\Controllers\Backend\homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function blogCategoryIndex(){
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Table'=>''];
        setThisPageTitle('table');
        return view('backend.single-pages.category.index',compact('breadcrumb'));
    }
    public function blog_categoryCreate(){
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'table'=>route('admin.blog.category.index'),'create'=>''];
        setThisPageTitle('Create');
        return view('backend.single-pages.category.form',compact('breadcrumb'));
    }
    

}
