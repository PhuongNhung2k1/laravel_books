<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use View;

use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    //
    private $model;
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    public function read(){
        $data  = $this->model->paginate(10);
        return view("backend.usersRead",["data"=>$data]);
    }

    public function create(){
        return view("backend.usersCreateUpdate");
    }
    public function createPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users|max:255',
            'password'=>'required',
            'level'=>'required',
        ],[
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Password không được để trống',
            'level.required'=>'Chức danh không được để trống',
        ]
    );
        
        // $userCheck = User::all();
        // foreach($userCheck as $user){
        //     if($user['email']==$request->email){
        //         return redirect()->back()->with('error', 'Email da ton tai');
        //     }
        // }
        // dd($userCheck);
        // if(Auth::check()&& Auth::user()->email ==$request->email){
        //     return redirect()->back()->with('error','Email này đã tồn tại');
        // }
        $request->except('_token');
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $password = $request->password; 
        $password = Hash::make($request->password);
        $level = $request->level;
        DB::table("users")->insert(["name" => $name, "email" => $email, "phone"=>$phone,"address"=>$address,"password" => $password, "level" => $level]);
        return redirect('admin/users');

    }
    public function update($id){
        $record = $this->model->find($id);
        return view("backend.usersCreateUpdate",["record"=>$record]);
    }
    public function updatePost(Request $request, $id){
        $request->except('_token');
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $level = $request->level;
        $phone = $request->phone;
        $address = $request->address;
        $password = Hash::make($request->password);
        // $emailAvailable = DB::table("users")->
        
        // dd($request);
        DB::table("users")->where('id','=',$id)->update(["name" => $name, "email" => $email, "phone"=>$phone,"address"=>$address,"password" => $password, "level" => $level]);
        return redirect(url('admin/users'));
    }
     public function delete($id){
        $this->model->find($id)->delete();
        return redirect(url('admin/users'));
    }

}
