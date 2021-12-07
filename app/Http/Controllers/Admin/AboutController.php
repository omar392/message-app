<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:abouts-read')->only(['index']);
        $this->middleware('permission:abouts-update')->only(['update']);
    }

    public function index(){
        $about = About::first();
        return view('admin.about.edit',compact('about'));
    }
    public function update(Request $request){
        $about = About::findOrFail(1);
        $about ->update([
            'about_ar'=>$request->input('about_ar'),
            'about_en'=>$request->input('about_en'),
            'mission_ar'=>$request->input('mission_ar'),
            'mission_en'=>$request->input('mission_en'),
            'vision_ar'=>$request->input('vision_ar'),
            'vision_en'=>$request->input('vision_en'),
        ]);
        toastr()->info('تم التعديل بنجاح');
        return redirect()->back();
    }
}
