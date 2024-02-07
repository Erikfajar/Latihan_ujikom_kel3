<?php

namespace App\Http\Controllers\Buku;

use App\Models\Buku;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\UlasanBuku;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UlasanBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtUlasan = UlasanBuku::orderby('id', 'desc')->get();
        return view('ulasan_buku.index', compact('dtUlasan'));
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
        Session::flash('buku_id', $request->buku_id);
        Session::flash('ulasan', $request->ulasan);
        Session::flash('rating', $request->rating);

        $user = Auth::user()->id;
        $request->validate(
            [
                'buku_id' => 'required',
                'ulasan' => 'required',
                'rating' => 'required',
            ],
            [
                'buku_id' => 'Judul buku wajib diisi',
                'ulasan' => 'deskripsikan tentang buku ini',
                'rating' => 'Rating sesuai pengalaman membacamu ',
            ]
        );
        $data = [
            'user_id' => $user,
            'buku_id' => $request->buku_id,
            'ulasan' => $request->ulasan,
            'rating' => $request->rating,
        ];

        UlasanBuku::create($data);
        return redirect()->route('ulasan_buku.index')
            ->with('succes', 'succesfully added data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dtBuku = Buku::find($id);
        return view('ulasan_buku.form_create', compact('dtBuku'));
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
        Session::flash('buku_id', $request->buku_id);
        Session::flash('ulasan', $request->ulasan);
        Session::flash('rating', $request->rating);

        $user = Auth::user()->id;
        $request->validate(
            [
                'buku_id' => 'required',
                'ulasan' => 'required',
                'rating' => 'required',
            ],
            [
                'buku_id' => 'Judul buku wajib diisi',
                'ulasan' => 'deskripsikan tentang buku ini',
                'rating' => 'Rating sesuai pengalaman membacamu ',
            ]
        );
        $data = [
            'user_id' => $user,
            'buku_id' => $request->buku_id,
            'ulasan' => $request->ulasan,
            'rating' => $request->rating,
        ];

        UlasanBuku::where('id', $id)->update($data);
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
        UlasanBuku::where('id', $id)->delete();
        return back()->with('success', 'successfully deleted data');
    }

    public function export_pdf(Request $request)
    {
        $data = UlasanBuku::orderBy('id', 'desc');
        $data = $data->get();

        // Pass parameters to the export view
        $pdf = PDF::loadview('ulasan_buku.exportPdf', ['data' => $data]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // SET FILE NAME
        $filename = date('YmdHis') . '_ulasan_buku';
        // Download the Pdf file
        return $pdf->download($filename . '.pdf');
    }
}
