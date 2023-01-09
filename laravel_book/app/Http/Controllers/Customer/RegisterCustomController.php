<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
class RegisterCustomController extends Controller
{
    //
    public function register(Request $request){
    
        $request->validate([
           'name'=>'required|string|min:2|max:255',
        //    'email'=>'required|string|email|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users,email,',
           'password'=>'required|string|min:4',
           'phone'=>'required|numeric|regex:/^[0-9]{10}+$/',
           'remember_token'=> 'required_with:password|same:password|min:4',
        ],[
            'name.required'=>'Ten khong duoc bo trong',
            'name.min'=>'Ten đăng nhập phải ít nhất 2 kí tự',
            'email.required'=>'email khong duoc bo trong',
            'email.unique'=>'email đã tồn tại',
            'password.required'=>'password khong duoc bo trong',
            'password.min'=>'password phải ít nhất 4 kí tự',
            'phone.numeric'=>'Phone là số',
            'phone.regex'=>'phone chỉ gồm 10 kí tự số',
            'remember_token.required_with'=>'Repassword phải trùng với password',
            'remember_token.min'=>'Repassword phải ít nhất 4 kí tự và trùng với password',
        ]);
      
        // dd($request);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=> Hash::make($request->password)
        ]);
    
        // DB::table("users")->insert(["name" => $name, "email" => $email,"phone"=>$phone,"address"=>$address, "password" => $password]);
        return back()->with('success','User has been create successfully');
    }
}
