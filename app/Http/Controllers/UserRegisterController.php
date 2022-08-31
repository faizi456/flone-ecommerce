<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Validator;
use Session;
use Illuminate\Support\Facades\Hash;


class UserRegisterController extends Controller
{
    public function userRegister(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'firstName'=>'required|max:100',
        //     'lastName'=>'required|max:100',
        //     'phone'=>'required|max:30',
        //     'email'=>'required|email|unique:users|max:100',
        //     'country'=>'required|max:255',
        //     'state'=>'required|max:150',
        //     'city'=>'required|max:100',
        //     'postcode'=>'required|max:20',
        //     'address'=>'required|max:255',
        //     'password'=>'required|max:20|min:8|confirmed',
        // ]);
        // if ($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        $mac = session('mac');
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->postcode = $request->postcode;
        $user->address = $request->address;
        $user->mac = $mac;
        $user->save();
        return response()->json(['res' => 'You have registered successfully!']);
    }

    public function viewLoginRegister(){
        if(Auth::check()){
            return redirect()->route('index');
        }
        else{
            return view("user.login_register");
        }
    }



    public function UserLogin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|email|max:100',
            'password'=>'required|max:20|min:8',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userdata = array(
            'email' => $request->email,
            'password' => $request->password,
        );
        if(Auth::attempt($userdata))
        {
            return redirect()->route('index');
        }
        else
        {
            Session::flash('error_message','Email or password is incorrect!');
            return back();
        }
    }

    public function userLogout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('index');
        }
    }
}
