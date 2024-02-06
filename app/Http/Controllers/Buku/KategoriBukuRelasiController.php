<?php

namespace App\Http\Controllers\Buku;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\KategoriBuku_Relasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class KategoriBukuRelasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtKategoriRelasi = KategoriBuku_Relasi::orderBy('id','desc')->get();
        return view('kategori_buku_relasi.index',compact('dtKategoriRelasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dtKategori = KategoriBuku::orderBy('nama_kategori','asc')->get();
        $dtBuku = Buku::orderBy('judul','asc')->get();
        return view('kategori_buku_relasi.form_create',compact('dtKategori','dtBuku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('kategori_id', $request->kategori_id);
        Session::flash('buku_id', $request->buku_id);
        
        $request->validate(
            [
                'kategori_id' => 'required',
                'buku_id' => 'required',
                
            ],
            [
                'kategori_id.required' => 'Ketegori buku wajib diisi',
                'buku_id.required' => 'Buku wajib diisi',
                
            ],
        );
        $data = [
            'kategori_id' => $request->kategori_id,
            'buku_id' => $request->buku_id,
           
        ];
        KategoriBuku_Relasi::create($data);
        return redirect()
        ->route('kategori_buku_relasi.index')
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
        $dtKategori = KategoriBuku::orderBy('nama_kategori','asc')->get();
        $dtBuku = Buku::orderBy('judul','asc')->get();
        $dt = KategoriBuku_Relasi::find($id);
        return view('kategori_buku_relasi.form_edit',compact('dt','dtKategori','dtBuku'));
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
        Session::flash('kategori_id', $request->kategori_id);
        Session::flash('buku_id', $request->buku_id);
        
        $request->validate(
            [
                'kategori_id' => 'required',
                'buku_id' => 'required',
                
            ],
            [
                'kategori_id.required' => 'Ketegori buku wajib diisi',
                'buku_id.required' => 'Buku wajib diisi',
                
            ],
        );
        $data = [
            'kategori_id' => $request->kategori_id,
            'buku_id' => $request->buku_id,
           
        ];
        KategoriBuku_Relasi::where('id', $id)->update($data);
        return redirect()
        ->route('kategori_buku_relasi.index')
        ->with('success', 'Data kategori buku berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriBuku_Relasi::where('id', $id)->delete();
        return back()->with('success', 'Data kategori buku berhasil di hapus');
    }
}
