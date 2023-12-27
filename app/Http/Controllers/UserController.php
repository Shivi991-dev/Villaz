<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /////// REGISTER USER ///////////
    function registerUser(Request $req){
        $req->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email' => 'required|unique:users,email',
            'password'=>'required|min:6',
        ]);
        $exists = User::where('email',$req->email)->first();
        if($exists){
            return redirect()->back()->with('error', 'User with this email already exists!');
        }
        else{
            $role = $req->userType;
            if($role == 'simple'){
                $role = 1;
            }
            else{
                $role = 2;
            }
            User::insert([
                'fname'=>$req->fname,
                'lname'=>$req->lname,
                'email'=>$req->email,
                'password'=>Hash::make($req->password),
                'role_id'=>$role,
            ]);
            $user = User::where('email',$req->email)->first();
            $encEmail = base64_encode($req->email) ;
                Mail::to($req->email)->send(new RegisterMail($user,$encEmail));
                // Mail::to('agamthakur96@gmail.com')->send(new RegisterMail($user));
                return redirect()->back()->with('success','A verification mail has been sent to your email !');
        }
    }

    ///////// LOGIN USER //////////
    function loginUser(Request $req){
        $req->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'role_id'=>1])){
            return redirect()->route('home')->with('success','Logged In Successfully');
        }
        elseif(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'role_id'=>2])){
            return redirect()->route('admin')->with('success','Logged In Successfully');
        }
        else{
            return redirect()->back()->with('error','Invalid Credentials!');
        }
    }

    /////////// LOGOUT USER ///////////
        function logoutUser(){
            Auth::logout();
            return redirect()->route('home')->with('success','You have been logged out!');
        }

        function verifyEmail($email){
            $decEmail = base64_decode($email);
            $user = User::where('email','=',$decEmail)->first();
            $user->email_verified = 1;
            $user->save();
            return redirect()->route('login')->with('success','Your email has been verified login to continue');
        }
}
