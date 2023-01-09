<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
   
    public function login(){
       return view("backend.login-admin");
    }

   public function loginPost(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $scredentials = $request->only('email','password');
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.login')->with('error','Email or password is incorrect!');
        // // if(Auth::check()&& Auth::attempt($scredentials)){
        //     if(Auth::check()){
        //     return redirect('admin/home')->with('success','Welcome');
        // }

        // return back()->with('error','Email or password is incorrect!');
       
    }
    
    public function logout(){
        Auth::logout();
        return  redirect()->route('admin.login');
    }

   
}
