<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{
    public function index(){
        if (Auth::check()) {
            if (Auth::guard('admin')->check()) {
                $users=User::all();
                $questions=Question::all();
                return view('Admin.dashbord',compact('users','questions')); // User is authenticated and authorized, continue with the request
            }
        }
        toastr()->error('الرجاء تسجيل الدخول اولا');
        return route('logoutAdmin');
    }
    
    public function login(){
        return view('Admin.login');
    }
    
    public function register(){
        return view('Admin.register');
    }
    
    public function checklogin(Request $request){
            $remember_me = $request->has('remember_me') ? true : false;
            if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
                // notify()->success('Admin Login Successfully!');
                toastr()->success('تم تسحيل دخول الادمن بنجاح');
                return redirect()->route('admin.index');   
            }else
            toastr()->error('حدث خطا الرجاء أدخال بيانات صحيحه');
            return  view('Admin.login');   
        }
        
    public function checkregister(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        Admin::create([
            'name' => $request->name,
            'email_verified_at'=>now(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // notify()->success('Admin Register Successfully!');
        return view('Admin.dashbord');
    }
    public function logoutAdmin(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return view('Admin.login');
    }
}