<?php

namespace App\Http\Controllers\Backend\homepage;

use App\Http\Controllers\Controller;
use App\Http\Requests\homePageCommonSectionReqest;
use App\Models\HomePageCommonTitle;
use Illuminate\Http\Request;

class homePageCommonSectionController extends Controller
{
    public function FormShow(){
        $breadcrumb = ['Dashboard' => route('app.dashboard'),'Create'=>''];
        setThisPageTitle('Create');
        $singlepagetitle=HomePageCommonTitle::where('section_name','single_page_title')->first();
        return view('backend.single-pages.homepage-common-title.form',compact('breadcrumb','singlepagetitle'));
    }
    public function updateOrCreate(homePageCommonSectionReqest $request){
        $data=[
            'service_sub_title'      => $request->service_sub_title,
            'whychoose_sub_title'    => $request->whychoose_sub_title,
            'portfolio_sub_title'    => $request->portfolio_sub_title,
            'testmonial_sub_title'   => $request->testmonial_sub_title,
            'blogs_sub_title'        => $request->blogs_sub_title,
            'contact_sub_title'      => $request->contact_sub_title,
            'service_title'          => $request->service_title,
            'whychoose_title'        => $request->whychoose_title,
            'portfolio_title'        => $request->portfolio_title,
            'testmonial_title'       => $request->testmonial_title,
            'blogs_title'            => $request->blogs_title,
            'contact_title'          => $request->contact_title,
            'service_description'    => $request->service_description,
            'whychoose_description'  => $request->whychoose_description,
            'portfolio_description'  => $request->portfolio_description,
            'testmonial_description' => $request->testmonial_description,
            'blogs_description'      => $request->blogs_description,
            'contact_description'    => $request->contact_description,
        ];
        HomePageCommonTitle::updateOrCreate(['section_name'=>'single_page_title'],[
            'section_name' => 'single_page_title',
            'data'         => json_encode($data),
            'status'       => $request->status
        ]);
        return redirect()->back()->with('success','single page title updated successfully');
    }
}
