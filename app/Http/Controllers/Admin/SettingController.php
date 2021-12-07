<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:settings-read')->only(['index']);
        $this->middleware('permission:settings-update')->only(['update']);
    }
    public function index(){
        $setting = Setting::first();
        return view('admin.setting.edit',compact('setting'));
    }
    public function update(Request $request){
        $setting = Setting::findOrFail(1);
        $setting ->update([
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'whatsapp'=>$request->input('whatsapp'),
            'facebook'=>$request->input('facebook'),
            'twitter'=>$request->input('twitter'),
            'snapchat'=>$request->input('snapchat'),
            'instagram'=>$request->input('instagram'),
        ]);
        toastr()->info('تم التعديل بنجاح');
        return redirect()->back();
    }
}
