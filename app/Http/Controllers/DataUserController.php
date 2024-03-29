<?php

namespace App\Http\Controllers;

use App\Models\User;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtUserPending = User::where('verifikasi','belum')->latest()->get();
        $dtUser = User::where('verifikasi','sudah')->orderBy('id','desc')->get();
        return view('data_user.index',compact('dtUser','dtUserPending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Session::flash('username', $request->username);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        Session::flash('nama_lengkap', $request->nama_lengkap);
        Session::flash('alamat', $request->alamat);

        $request->validate(
            [
                'username' => 'required',
                'email' => 'required',
                'password' => 'required|min:5',
                'nama_lengkap' => 'required|max:30',
                'alamat' => 'required',
            ],
            [
                'username.required' => 'Username wajib di isi',
                'email.required' => 'Email wajib di isi',
                'password.required' => 'Password wajib di isi',
                'nama_lengkap.required' => 'Nama Lengkap wajib di isi',
                'alamat.required' => 'Alamat wajib di isi',
            ],
        );

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
        ];

        User::where('id', $id)->update($data);
        return back()->with('success', 'Data User berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('success', 'Data user berhasil di hapus');
    }

    public function export_pdf(Request $request)
    {
        $data = User::latest();
        $data = $data->get();

        // Pass parameters to the export view
        $pdf = PDF::loadview('data_user.exportPdf', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // SET FILE NAME
        $filename = date('YmdHis') . '_data_user';
        // Download the Pdf file
        return $pdf->download($filename.'.pdf');
    }

    public function confirm(Request $request, $id)
    {

        // $dtUser = User::find($id);
        
        $data = ['verifikasi' => 'sudah'];
       
        User::where('id',$id)->update($data);
        return back()->with('success');

    }

}
