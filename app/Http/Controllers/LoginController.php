<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login',[
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nama' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $data = $request->input();
            $request->session()->put('nama', $data['nama']);
            return redirect()->intended('/dashboard');
        }
 
        return back()->withErrors([
            'nama' => 'Login Failed',
        ])->onlyInput('nama');
    }

    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
