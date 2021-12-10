<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\IntroductionController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ReferenceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;



Route::get('admin/home',[AdminController::class,'index'])->name('adminhome');
Route::GET('admin',[LoginController::class,'showLoginForm'])->name('admin.login');
Route::POST('admin',[LoginController::class,'login']);
Route::POST('logout',[LoginController::class,'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {


//Admins
Route::resource('admins', AdminsController::class);
Route::post('admins_status',[AdminsController::class,'adminsStatus'])->name('admins.status');

//roles
Route::resource('roles', RoleController::class);

//settings
Route::get('setting',[SettingController::class,'index'])->name('setting');
Route::post('setting',[SettingController::class,'update'])->name('updatesetting');

//about_us
Route::get('about',[AboutController::class,'index'])->name('about');
Route::post('about',[AboutController::class,'update'])->name('updateabout');

//messages
Route::resource('message', MessageController::class);
Route::post('message_status',[MessageController::class,'messageStatus'])->name('message.status');

//introduction
Route::resource('introduction', IntroductionController::class);
Route::post('introduction_status',[IntroductionController::class,'introductionStatus'])->name('introduction.status');

//references
Route::resource('reference', ReferenceController::class);
Route::post('reference_status',[ReferenceController::class,'referenceStatus'])->name('reference.status');

//users
Route::resource('user', UserController::class);
Route::post('user_status',[UserController::class,'userStatus'])->name('user.status');

//contact
Route::resource('contact', ContactController::class);

});

