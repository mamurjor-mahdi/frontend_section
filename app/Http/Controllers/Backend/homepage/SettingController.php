<?php

namespace App\Http\Controllers\Backend\homepage;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function settingCreate(){
        $breadcrumb=['Dashboard'=>route('app.dashboard'),'Settings'=>''];
        setThisPageTitle('Settings');
        
        return view('backend.single-pages.settings.form',compact('breadcrumb'));
    }
    public function settingUpdateOrCreate(Request $request){
        Setting::updateOrCreate(['key' => 'footer_copyright'],['key'=>'footer_copyright','values' => $request->footer_copyright]);

        return redirect()->back()->with('success','Setting Updated Successfully');
    }
    
}
