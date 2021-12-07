<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMINHOME;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');;
    }

    public function showLoginForm (){
        return view('admin.login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            toastr()->success('تم تسجيل الدخول بنجاح');
            return redirect()->intended($this->redirectPath());
        }
        toastr()->error('لم يتم تسجيل الدخول راجع بياناتك ');
        return redirect('admin');
    }

    protected function guard(){
        return Auth::guard('admin');
    }
}