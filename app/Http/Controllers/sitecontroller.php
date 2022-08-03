<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AdminAuth;
use Session;
use Illuminate\Support\Facades\Hash;


class sitecontroller extends Controller
{
    public function index(Request $request){
        
    }
    public function login(){
        if(Session::has('admin_email')){
            return redirect("admindash");
        }
        else{
            return view('admin.login');
        }
    }

    public function admindash(){
        return view("admin.dash");
    }
    public function getLogin(Request $request){
        $email = $request->input("email");
        $password = $request->input("password");

        $result = AdminAuth::where(['email'=>$email])->first();
        if(Hash::check($password, $result->password)){
            $request->session()->put('admin_email',$result->email);
            return redirect('admindash');
        }
        else{
            Session::flash('error_message', 'Email or password is incorrect!');
            return redirect('login');
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
    }
}
