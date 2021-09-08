<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:15',
            'cpassword'=>'required|same:password',
        ],
            [
            'cpassword.same'=>'eşleşmiyor'
        ]);

        $password=Hash::make($request->password);
        $new=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password
        ];

        $data=User::create($new);

        if ($data){
            return redirect()->back()->with('success','You have registered successfully');
        }
        else{
            return redirect()->back()->with('error','Registration failed');

        }
    }

    public function logged(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:15',
            ],
        );
        $check=$request->only('email','password');


        if(Auth::guard('web')->attempt($check)){
           return  redirect()->route('user.home')->with('success','welcome to dashboard');
        }
        else{
            return redirect()->back()->with('error','Login failed');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect('user/login');
    }
}
