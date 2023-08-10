<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterAdminController extends Controller
{
    //
    public function index()
    {
        return view('register');
    }

    public function actionregister(Request $request)
    {
        $user = UserModel::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/');
    }
    public function changePassword()
    {
        return view('change-password');
    }
    public function updatePassword(Request $request)
    {
        // dd($request->all());
        $request->validate([

            'password' => 'required|min:8',
        ]);
        $user = UserModel::find(auth()->user()->id);
        $user->update([

            'password' => Hash::make($request->password),
        ]);
        // dd($user);
        return redirect('/');
    }

}
