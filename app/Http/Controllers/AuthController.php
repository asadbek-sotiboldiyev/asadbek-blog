<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView(){
        return view('auth/login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(auth()->attempt($request->only('email', 'password'))){
            return redirect('/write');
        }
        return redirect()->back();
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
