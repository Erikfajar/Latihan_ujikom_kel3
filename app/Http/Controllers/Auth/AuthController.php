<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        return view('auth_manual.login');
    }

    public function auth(Request $request)
    {
        // dd($request);
        $validasi = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email harus di isi',
            'password.requires' => 'Password harus di isi'
        ]);

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success','Berhasil Login');
        }

        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
