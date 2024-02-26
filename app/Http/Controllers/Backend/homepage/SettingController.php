<?php

namespace App\Http\Controllers\Backend\homepage;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function settingCreate(){
        $breadcrumb=['Dashboard'=>route('admin.dashboard'),'Create'=>''];
        setThisPageTitle('create');
        $settings=Setting::first();
        return view('backend.single-pages.settings.form',compact('breadcrumb','settings'));
    }
    public function settingUpdateOrCreate(Request $request){
        $request->validate([
            'key_name'    => 'required',
            'value'       => 'required',
        ]);
        Setting::updateOrCreate(
            ['key_name' => $request->key_name],
            ['value' => $request->value]
        );
        return redirect()->back()->with('success','Setting Updated Successfully');
    }
    
}
