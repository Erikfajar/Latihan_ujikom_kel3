<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//LOAD MODEL
use App\Models\DtBarang;
use App\Models\TmKategoriBarang;
use App\Models\KategoriBuku_Relasi;
use App\Models\Peminjaman;
use App\Models\User;


class DashboardController extends Controller
{

    public function index(Request $request)
	{
        $total_user = User::count();
        $total_peminjaman = Peminjaman::count();
        $total_kategoribuku_relasi = KategoriBuku_Relasi::count();
      

        return view('dashboard.index'
        ,
        [
            'total_user' => $total_user,
            'total_peminjaman' => $total_peminjaman,
            'total_kategoribuku_relasi' => $total_kategoribuku_relasi,
     
        ]
    );
	}

}
