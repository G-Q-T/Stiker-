<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required'],
        ]);

        // authentikasi :attempt
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard.index'))->with('succes', 'selamat datang kembali di dashboard admin ppkd sticker');
        }

        return back()->withErrors(['email' => 'email atau password salah.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {

        Auth::logout();
        return redirect('admin/login');
    }
}
