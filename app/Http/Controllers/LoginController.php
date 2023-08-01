<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function loginAction(Request $request){
        $data =[
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)){
            return redirect('/');
        }else{
            Session::flash('error','Username atau Password Salah');
            return redirect('/');
        }
    }
    public function Logout() {
        Auth::logout();
        return redirect('/');
    }
}
