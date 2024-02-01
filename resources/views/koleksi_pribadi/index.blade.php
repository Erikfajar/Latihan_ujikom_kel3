@extends('template_back.content')
@section('title', 'Koleksi Pribadi')
@section('content')

<!-- container opened -->
<div class="container">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Koleksi Pribadi (namaUser)</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item text-white active">Data Koleksi</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->
    <div class="row row-sm">
        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
            <div class="card">
                

                <div class="pd-t-10 pd-s-10 pd-e-10 bg-white bd-b">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Data Koleksi</p>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex my-auto btn-list justify-content-end">
                                <a class="btn-sm btn btn-info" href=""><i class="fa fa-plus"></i> Peminjaman</a>
                                <a class="modal-effect btn-sm btn btn-primary" data-bs-effect="effect-rotate-bottom" data-bs-toggle="modal" href="#modaldemo8"><i class="fa fa-plus"></i> Tambah</a>
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
                            <label class="form-label mt-2 mb-0">Kategori Buku</label> 
                            <select id="f1" class="form-control select2" onchange="reload_table()">
                                {{-- @php $db = DB::table('tm_kategoribarang')->select('*')->orderBy('nama','ASC')->get(); @endphp
                                <option value="">=== semua ===</option>
                                @foreach($db as $key => $val)
                                <option value="{{$val->id}}" @if(request()->get('f1')==$val->id) selected @endif>{{$val->nama}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="tbl_list" class="table table-sm table-striped table-bordered tx-14" width="100%">
                            <thead>
                                <tr>
                                    <th width="20px">No</th>
                                    <th width="50px">Judul</th>
                                    <th width="50px">Penulis</th>
                                    <th width="120px">Penerbit</th>
                                    <th width="80px">Tahun Terbit</th>
                                    <th width="80px">Action</th>
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
                                    <td><img width="100px" height="60px" class="rounded-5" src="@if($dt->img) {{asset('')}}images/barang/{{$dt->img}} @else {{asset('')}}images/no-image.png @endif" style="object-fit:cover"> </td>
                                    <td>{{$dt->kode??''}}</td>
                                    <td>{{$dt->nama??''}}</td>
                                    <td>{{$dbKategori->nama??''}}</td>
                                    <td>{{isset($dt->harga_satuan)?$Konversi->uang($dt->harga_satuan??''):''}}</td>
                                    <td>{{isset($dt->harga_jual)?$Konversi->uang($dt->harga_jual??''):''}}</td>
                                    <td>{{$dt->satuan??''}}</td>
                                    <td>{{isset($dt->tgl_produksi)?$Tanggal->ind($dt->tgl_produksi??'','/'):''}}</td>
                                    <td>{{isset($dt->tgl_expired)?$Tanggal->ind($dt->tgl_expired??'','/'):''}}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data_barang.destroy', $dt->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('data_barang.edit', $dt->id) }}" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
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
@include('data_buku.modal_create')
@include('data_buku.modal_import')

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
            
            function reload_table(){
                var f1 =  $('#f1').val();	
                window.location.href="data_barang?f1="+f1;
            }
            function formImport() {
                $("#formImport")[0].reset();
                $("#mdl_formImport").modal('show');
            }
            function exportExcel() {
                var f1 =  $('#f1').val();
                var s = $('.whatever').val();		
                window.open(
                "data_barang/export_excel?s="+s+"&f1="+f1,
                    '_blank' // <- This is what makes it open in a new window.
                );
            }
            function exportPdf() {
                var f1 =  $('#f1').val();
                var s = $('.whatever').val();		
                window.open(
                "data_barang/export_pdf?s="+s+"&f1="+f1,
                    '_blank' // <- This is what makes it open in a new window.
                );
            }
        </script>
    



@endsection