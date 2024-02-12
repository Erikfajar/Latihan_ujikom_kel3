<?php

namespace App\Http\Controllers\Buku;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtPeminjam = Peminjaman::with('user', 'buku')
             ->orderBy('id', 'desc')
             ->get();
        return view('peminjaman.index', compact('dtPeminjam')); 
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
        Session::flash('tanggal_peminjaman', $request->tanggal_peminjaman);
        Session::flash('tanggal_pengembalian', $request->tanggal_pengembalian);
        Session::flash('status_peminjaman', $request->status_peminjaman);

        $user = Auth::user()->id;
        $request->validate(
            [
                'buku_id' => 'required',
                'tanggal_peminjaman' => 'required',
                'tanggal_pengembalian' => 'required',
                'status_peminjaman' => 'required',
            ],
            [
                'buku_id.required' => 'buku_id wajib diisi',
                'tanggal_peminjaman.required' => 'TanggalPeminjaman wajib diisi',
                'tanggal_pengembalian.required' => 'TanggalPengembalian wajib diisi',
                'status_peminjaman.required' => 'StatusPeminjaman wajib diisi',
            ],
        );
        $data = [
            'user_id' => $user,
            'buku_id' => $request->buku_id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status_peminjaman' => $request->status_peminjaman,
        ];

        Peminjaman::create($data);
        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'successfully added data'); 
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
        return view('peminjaman.form_create', compact('dtBuku'));
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
        Session::flash('tanggal_peminjaman', $request->tanggal_peminjaman);
        Session::flash('tanggal_pengembalian', $request->tanggal_pengembalian);
        Session::flash('status_peminjaman', $request->status_peminjaman);

        $user = Auth::user()->id;
        $request->validate(
            [
                'buku_id' => 'required',
                'tanggal_peminjaman' => 'required',
                'tanggal_pengembalian' => 'required',
                'status_peminjaman' => 'required',
            ],
            [
                'buku_id.required' => 'buku_id wajib diisi',
                'tanggal_peminjaman.required' => 'TanggalPeminjaman wajib diisi',
                'tanggal_pengembalian.required' => 'TanggalPengembalian wajib diisi',
                'status_peminjaman.required' => 'StatusPeminjaman wajib diisi',
            ],
        );
        $data = [
            'user_id' => $user,
            'buku_id' => $request->buku_id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status_peminjaman' => $request->status_peminjaman,
        ];

        Peminjaman::where('id',$id)->update($data);
        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'successfully update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Peminjaman::where('id', $id)->delete();
        return back()->with('success', 'successfully deleted data');
    }
    public function export_pdf(Request $request)
    {
        $data = Peminjaman::latest();
        $data = $data->get();

        // Pass parameters to the export view
        $pdf = PDF::loadview('peminjaman.exportPdf', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // SET FILE NAME
        $filename = date('YmdHis') . '_peminjaman';
        // Download the Pdf file
        return $pdf->download($filename.'.pdf');
    }
}
