<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SoloController extends Controller
{
    public function social()
    {
        $social = Setting::first();

        if($social){
            return response()->json([
                'status'=>'success',
                'id' => $social->id,
                'facebook' => $social->facebook,
                'twitter' => $social->twitter,
                'email' => $social->email,
                'phone' => $social->phone,
                'snapchat' => $social->snapchat,
                'instagram' => $social->instagram,
                'whatsapp' => $social->whatsapp,
            ],200);
        }

    }
    public function aboutUs()
    {
        $about = About::first();

        if($about){
            return response()->json([
                'status'=>'success',
                'id' => $about->id,
                'about_ar' => $about->about_ar,
                'about_en' => $about->about_en,
                'terms_ar' => $about->mission_ar,
                'terms_en' => $about->mission_en,
            ],200);
        }

    }
    
    public function contactUs(Request $request)
    {
        $rules = [
            'phone'     => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'message'  => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $contact = Contact::create(array_merge(
            $validator->validated(),
        ));
        if($contact){
            return response()->json([
            'status' => 'success',
            'message' => 'message sent successfully',
        ], 200);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'error',
            ], 200);
        }
    }
}
