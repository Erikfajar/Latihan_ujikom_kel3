@extends('template_back.content')
@section('title', 'From Peminjaman Buku')
@section('content')

<!-- container opened -->
<div class="container">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">From Input Barang</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item text-white active">Form Peminjaman Buku</li>
                <ol>
            </nav>
        </div>
    </div>
<!-- /breadcrumb -->
<div class="row row-sm">
    <div class="col-x1-12 col-lg-12 col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                     Form Peminjaman Buku
                </div>
                <p class="mg-b-20">Silahkan isi form di bawah ini dengan lengkap.</p>
                <!-- message info -->
                @include('_component.message')
                <div class="pd-10 pd-sm-20 bg-gray-100">
                    <form action="{{ route('peminjaman.create') }}" method="post" >
                    @csrf
                    <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-3">
                                        <label class="form-label mg-b-0">Judul/Nama Buku </label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <select class="form-control select2" name="bukuID">
                                            {{-- @php
                                            $dbKategori = DB::table('tm_kategoribarang')->select('*')->orderBy('nama','ASC')->get(); 
                                            @endphp
                                            <option value="">=== pilih ===</option>
                                            @foreach($dbKategori as $key => $val)
                                            <option value="{{$val->id}}" @if(old("kategori_id")==$val->id) selected @endif>{{$val->nama}}</option>
                                            @endforeach --}}
                                            </select>
                                        </div>
                                    <div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Tanggal Peminjaman </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input class="form-control numberonly" name='TanggalPeminjaman' placeholder="haha" type="date"  value="{{old('TanggalPeminjaman')}}">
                                        </div>
                                        </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Tanggal Pengembalian </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input class="form-control numberonly" name='TanggalPengembalian' placeholder="" type="date"  value="{{old('TanggalPengembalian')}}">
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Status Peminjaman </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input class="form-control" placeholder="" type="text" name="StatusPeminjaman" value="{{old('StatusPeminjaman')}}">
                                        </div>
                                    </div>
                                 </div>
                             </div>
                          </div>

                        </div>
                        <button type="submit" class="float-right btn btn-primary pd-x-30 mg-e-5 mg-t-5">
                            <i class='fa fa-save'></i> Simpan</button>
                        <a href="" class="btn btn-secondary pd-x-30 mg-t-5">
                            <i class='fa fa-chevron-left'></i> Kembali</a>
                        </form>
                      </div>
                 </div>
            </div>
        </div>

    </div>
             
     <div class="row row-sm">
         <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
            <div class="card">


            <div class="pd-t-10 pd-s-10 pd-e-10 bg-white bd-b">
                 <div class="row">
                        <div class="col-md-6">
                            <p>Data Peminjaman Buku</p>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex my-auto btn-list justify-content-end">
                                <button onclick="formImport()" class="btn btn-sm btn-secondary"><i class="fa fa-upload me-2"></i> Import</button>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="fa fa-download me-2"></i>Export
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="exportExcel()">Excel</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="exportPdf()">PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="card-body">
                    <!-- message info -->
                    @include('_component.message')
                    <div class="row">
                        <div class="col-md-3">
                            <label class="fom-label mt-2 mb-0">kategori Buku</label>
                            <select id="f1 class=from-control select2" onchange="reload_table()">
                                {{-- @php $db = DB::table('tm_kategoribarang')->select('*')->orderBy('nama','ASC')->get(); @endphp
                                <option value="">=== semua ===</option>
                                @foreach($db as $key => $val)
                                <option value="{{$val->id}}" @if(request()->get('f1')==$val->id) selected @endif>{{$val->nama}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="table-resvonsive">
                        <table id="tbl_list" class="table table-sm table-striped table-bordered tx-14" width="100%">
                            <thead>
                                <tr>
                                    <th width="20px">No</th>
                                    <th width="50px">User</th>
                                    <th width="50px">Buku</th>
                                    <th width="120px">TGL Peminjaman</th>
                                    <th width="120px">TGL Pengembalian</th>
                                    <th width="80px">Status</th>
                                    <th width="50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- @php $no=1; @endphp
                            @foreach($data as $dt)
                                @php 
                                $dbKategori=DB::table('tm_kategoribarang')->select('*')->where('id','=',$dt->kategori_id)->first();
                                @endphp
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$dt->User??''}}</td>
                                    <td>{{$dt->Buku??''}}</td>
                                    <td>{{isset($dt->tgl_peminjaman)?$Tanggal->ind($dt->tgl_peminjaman??'','/'):''}}</td>
                                    <td>{{isset($dt->tgl_pengembalian)?$Tanggal->ind($dt->tgl_pengembalian??'','/'):''}}</td>
                                    <td>{{$dt->Status??''}}</td>
                                    <td>{{$dt->Action??''}}</td>
                                    <td>
                                        <from onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data_peminjaman.destroy', $dt->id) }}" method="POST">
                                            @csrf
                                            @method('DELET')
                                            <a href="{{ route('data_peminjaman.edit', $dt->id) }}" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </from>
                                    </td>
                                </tr> 
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</div>
<!-- /container -->
                              

     
<script>
    $(function() {
        // formelement
        $('.select2').select2({ width: 'resolve' });

         // init datatable.
         $('#tbl_list').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

    });

    function reload_table() {
        var f1 =  $('#f1').val();	
        window.location.href="data_peminjaman?f1="+f1;
    }
    function formImport() {
        $("#formImport")[0].reset();	
        $("#mdl_formImport").modal('show');
    }
    function exportExcel() {
        var f1 =  $('#f1').val();
        var s = $('.whatever').val();		
        window.open(
        "data_peminjaman/export_excel?s="+s+"&f1="+f1,
            '_blank' // <- This is what makes it open in a new window.
        );
    }
    function exportPdf() {
        var f1 =  $('#f1').val();
        var s = $('.whatever').val();		
        window.open(
        "data_peminjaman/export_pdf?s="+s+"&f1="+f1,
            '_blank' // <- This is what makes it open in a new window.
        );
    }
</script>


@endsection