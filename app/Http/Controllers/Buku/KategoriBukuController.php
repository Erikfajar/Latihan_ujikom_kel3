<?php

namespace App\Http\Controllers\Buku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtKategori = KategoriBuku::orderBy('id','desc')->get();
        return view('kategori_buku.index',compact('dtKategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_kategori', $request->nama_kategori);
        
        $request->validate(
            [
                'nama_kategori' => 'required',
                
            ],
            [
                'nama_kategori.required' => 'Ketegori buku wajib diisi',
            ],
        );
        $data = [
            'nama_kategori' => $request->nama_kategori,
        ];
        KategoriBuku::create($data);
        return back()
        ->with('success', 'Data kategori buku berhasil di tambahkan');
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
        Session::flash('nama_kategori', $request->nama_kategori);
        
        $request->validate(
            [
                'nama_kategori' => 'required',
                
            ],
            [
                'nama_kategori.required' => 'Ketegori buku wajib diisi',
            ],
        );
        $data = [
            'nama_kategori' => $request->nama_kategori,
        ];
        KategoriBuku::where('id', $id)->update($data);
        return back()->with('success', 'successfully updated the data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriBuku::where('id', $id)->delete();
        return back()->with('success', 'Data kategori buku berhasil di hapus');
    }
}
