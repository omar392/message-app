<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ReferenceController;
use App\Http\Controllers\Api\SoloController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




//messages
Route::get('all-messages',[MessageController::class,'getMessage']);
//introductions
Route::get('introductions',[MessageController::class,'getIntroduction']);
//references
Route::get('all-references',[ReferenceController::class,'getReference']);
//setting
Route::get('social',[SoloController::class,'social']);
//about us
Route::get('about-us',[SoloController::class,'aboutUs']);
//contact us
Route::post('contact-us',[SoloController::class,'contactUs']);

// register
Route::post('register',[AuthController::class,'registerUser']);
Route::post('verifycode',[AuthController::class,'verifyCode']);
Route::post('resendcode',[AuthController::class,'resetCode']);
Route::post('forgetpassword',[AuthController::class,'forgetPassword']);
Route::post('login',[AuthController::class,'loginUser']);
// end register

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user',[AuthController::class,'userData']);
    Route::post('update-user',[AuthController::class,'updateUser']);

    //favorite



    //end favorite

    Route::get('logout', [AuthController::class, 'logout']);
});
