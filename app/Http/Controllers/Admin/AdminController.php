<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function login(Request $request){
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('admin.dashboard');
        }else{
            return back();
        }
    }

    public function dashboard(){
        return view('admin.dashboard');
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function register(){
        return view('admin.register');
    }

    public function registration(Request $request){
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.dashboard');
    }   
}
