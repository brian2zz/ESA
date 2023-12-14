<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    public function login(request $request){
        $this->validate($request,[
            'username' => 'required',
            'pass' => 'required|alphaNum|min:3',
        ]);

        $user_data = array(
            'username'=> $request->get('username'),
            'password'=> $request->get('pass'),
        );
        
        if(Auth::attempt($user_data)){
            return redirect('/index');
        }
        else{
            return back()->with('error','Login Gagal !');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
