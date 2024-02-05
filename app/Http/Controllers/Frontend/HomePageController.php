<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\frontendSection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function home(){
        $hero=DB::table('frontend_sections')->where('section_name','hero_section')->first();
        $data['hero_section']=json_decode($hero->data);
        return view('layouts.frontend.index',$data);
    }
    
}
