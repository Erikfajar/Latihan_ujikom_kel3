<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth_manual.login');
    }

    public function auth(Request $request)
    {
        $email = $request->input('email'); // MENGAMBIL NILAI INPUR EMAIL
        $cariEmail = User::where('email', $email)->first(); // MEMANGGIL SEMUA DATA YANG TELAH DI DAPAT
        $cariVerifikasi = $cariEmail->verifikasi; // MENGECEK DATA DARI COLUMN VERIFIKASI
        
        // KONDISI KALO $CARIVARIFIKASI TIDAK SAMA DENGAN SUDAH MAKA BISA LOGIN
        if($cariVerifikasi !== 'sudah'){
            return back()->with('success','Akun anda belum di Aktivasi');
        }
        $validasi = $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email harus di isi',
                'password.requires' => 'Password harus di isi',
            ],
        );

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();

            return redirect()
                ->route('dashboard')
                ->with('success', 'Berhasil Login');
        }

        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function registrasi(Request $request)
    {
        return view('auth_manual.registrasi');
    }

    public function auth_regis(Request $request)
    {
        Session::flash('username', $request->username);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        Session::flash('nama_lengkap', $request->nama_lengkap);
        Session::flash('alamat', $request->alamat);
        Session::flash('role', $request->role);

        $request->validate(
            [
                'username' => 'required',
                'email' => 'required',
                'password' => 'required|min:5',
                'nama_lengkap' => 'required|max:30',
                'alamat' => 'required',
                'role' => 'required',
            ],
            [
                'username.required' => 'Username wajib di isi',
                'email.required' => 'Email wajib di isi',
                'password.required' => 'Password wajib di isi',
                'nama_lengkap.required' => 'Nama Lengkap wajib di isi',
                'alamat.required' => 'Alamat wajib di isi',
                'role.required' => 'Role wajib di isi',
            ],
        );

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'role' => $request->role,
        ];

        // dd($data);
        User::create($data);
        return back()->with('success', 'Berhasil melakukan registrasi');
    }
}
