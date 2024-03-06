<?php

namespace App\Http\Controllers\Backend\homepage;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function blogCategoryIndex(){
        $breadcrumb = ['Dashboard' => route('app.dashboard'),'Table'=>''];
        setThisPageTitle('table');
        $categorys=Category::all();
        return view('backend.single-pages.category.index',compact('breadcrumb','categorys'));
    }
    public function blogCategoryCreate(){
        $breadcrumb = ['Dashboard' => route('app.dashboard'),'table'=>route('app.blog.category.index'),'create'=>''];
        setThisPageTitle('Create');
        return view('backend.single-pages.category.form',compact('breadcrumb'));
    }
    public function blogCategoryStore(Request $request){
        $request->validate([
            'category_name'=>'required',
            'status'=>'required',
        ]);
        Category::create([
            'category_name' => $request->category_name,
            'slug'          => Str::slug($request->category_name),
            'status'        => $request->status
        ]);
        return redirect()->route('app.blog.category.index')->with('success','category create successfully');
    }
    public function blogCategoryEdit($id){
        $breadcrumb = ['Dashboard' => route('app.dashboard'),'table'=>route('app.blog.category.index'),'Edit'=>''];
        setThisPageTitle('Edit');
        $categorys=Category::find($id);
        return view('backend.single-pages.category.form',compact('breadcrumb','categorys'));
    }
    public function blogCategoryUpdate(Request $request,$id){
        $categorys=Category::find($id);
        $request->validate([
            'category_name'=>'required',
            'status'=>'required',
        ]);
        $categorys->update([
            'category_name' => $request->category_name,
            'slug'          => Str::slug($request->category_name),
            'status'        => $request->status
        ]);
        return redirect()->route('app.blog.category.index')->with('success','category update successfully');
    }
    public function blogCategoryDelete($id){
        Category::find($id)->delete();
        return redirect()->back()->with('success','category delete successfully');
    }
}
