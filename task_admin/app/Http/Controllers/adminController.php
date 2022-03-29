<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\admin;

class adminController extends Controller
{
    public function Create(){
        return view('Admin.create');

    }
    public function Register(Request $request){

        $data = $this->validate($request,[
           "name"   => "required|min:3",
           "email"  => "required|email|unique:admin",
           "password" => ["required",Password::min(6)->letters()]
        ]);


        $data['password'] = bcrypt($data['password']);

       $op =   admin :: create($data);

       if($op){
           $message = 'Raw Inserted';
       }else{
           $message = 'Error Try Again';
       }

     session()->flash('Message',$message);

     return redirect(url('admin/login'));

    }
    ###################################################
    public function Login(){

       return view('Admin.login');
    }
    ////////////////////////////////////////////////
    public function DoLogin(Request $request){

        $data = $this->validate($request,[
           "email"  => "required|email",
           "password" => ["required",Password::min(6)->letters()]
        ]);
        if(auth()->attempt($data)){
         return redirect(url('admin/create'));
        }
        else{session()->flash('Message','Error Try agin ');}

    }
}