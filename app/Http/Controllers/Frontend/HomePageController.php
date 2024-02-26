<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\frontendSection;

class HomePageController extends Controller
{
    public function home(){
        $data['hero_sections']=DB::table('frontend_sections')->where('section_name','hero_section')->first();
        $data['commontitle']=DB::table('home_page_common_titles')->where('section_name','single_page_title')->first();
        $data['counter_sections']=DB::table('frontend_sections')->where('section_name','counter_section')->get();
        $data['about_sections']=DB::table('frontend_sections')->where('section_name','about_section')->first();
        $data['service_sections']=DB::table('frontend_sections')->where('section_name','service_section')->get();
        $data['choose_sections']=DB::table('frontend_sections')->where('section_name','choose_section')->get();
        $data['portfolio_sections']=DB::table('frontend_sections')->where('section_name','portfolio_section')->get();
        $data['testmonial_sections']=DB::table('frontend_sections')->where('section_name','testmonial_section')->get();
        $data['blog_sections'] = frontendSection::with('category')->where('section_name', 'blog_section')->where('status', 1)->get();
        $data['hireme_sections']=DB::table('frontend_sections')->where('section_name','hireme_section')->first();
        $data['mapaddress_sections']=DB::table('frontend_sections')->where('section_name','mapaddress_section')->first();
        return view('layouts.frontend.index',$data);
    }
    
}
