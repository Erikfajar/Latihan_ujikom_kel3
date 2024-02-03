<?php

namespace App\Http\Controllers\Buku;

use App\Http\Controllers\Controller;
use App\Models\KoleksiPribadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiPribadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cekUser = Auth::user()->id;
        $dtKoleksi = KoleksiPribadi::where('user_id',$cekUser)->get();
        return view('koleksi_pribadi.index',compact('dtKoleksi'));
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
    public function store(Request $request, $id)
    {
        $cekUser = Auth::user()->id;

        $data = [
            'user_id' => $cekUser,
            'buku_id' => $id
        ];

        KoleksiPribadi::create($data);
        return back()->with('success','Berhasil memasukan ke koleksi pribadi');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KoleksiPribadi::find($id)->delete();
        return back()->with('success','Berhasil di hapus');
    }
}
