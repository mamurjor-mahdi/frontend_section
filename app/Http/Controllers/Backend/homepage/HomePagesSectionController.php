<?php

namespace App\Http\Controllers\Backend\homepage;

use Illuminate\Http\Request;
use App\Models\frontendSection;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeroSectionRequest;

class HomePagesSectionController extends Controller
{
    public function HeroformShow(){
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Create'=>''];
        setThisPageTitle('Create');
        $heroSection=frontendSection::where('section_name','hero_section')->first();
        return view('backend.single-pages.hero-section.form',compact('breadcrumb','heroSection'));
    }
    public function updateOrCreate(HeroSectionRequest $request){
        if($request->hero_image !=null){
            if($request->hasFile('hero_image') !=null){
                $image=$this->file_update($request->file('hero_image'),'Backend/images/homepages/hero_image',$request->hero_image_old);
            }else{
                $image=$request->hero_image_old;
            }
        }else{
            if($request->hasFile('hero_image')){
                $image=$this->file_upload('Backend/images/homepages/hero_image',$request->file('hero_image'));
            }
        }
        
        $social_share=[];
        foreach($request->social_share as $value){
            $social_share[]=[
                'socail_icon'   => $value['socail_icon'],
                'socail_url'    => $value['socail_url'],
                'socail_target' => $value['socail_target'],
            ];
        };
        $data=[
            'hello_text'         => $request->hello_text,
            'title'              => $request->title,
            'designation'        => $request->designation,
            'hire_button_target' => $request->hire_button_target,
            'hire_button_url'    => $request->hire_button_url,
            'hire_button_text'   => $request->hire_button_text,
            'cv_button_target'   => $request->cv_button_target,
            'cv_button_url'      => $request->cv_button_url,
            'cv_button_text'     => $request->cv_button_text,
            'social_share'       => json_encode($social_share),
            'hero_image'         => $image,

        ];
        frontendSection::updateOrCreate(['section_name' => 'hero_section'],[
            'section_name' => 'hero_section',
            'data'         => json_encode($data),
            'status'       => $request->status
        ]);

        return redirect()->back()->with('success','updated successfully');
    }
}
