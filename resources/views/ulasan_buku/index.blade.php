@extends('template_back.content')
@section('title', 'Ulasan Buku')
@section('content')

<!-- container opened -->
<div class="container">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Data Ulasan Buku</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item text-white active">Data Ulasan Buku</li>
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
                            <p>Data Ulasan Buku</p>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex my-auto btn-list justify-content-end">
                                {{-- <a class="modal-effect btn-sm btn btn-warning" data-bs-effect="effect-fall" data-bs-toggle="modal" href="#modaldemo10"><i class="fa fa-plus"></i> Tambah</a> --}}
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
                                    <th width="50px">User</th>
                                    <th width="50px">Buku</th>
                                    <th width="120px">Ulasan</th>
                                    <th width="80px">Rating</th>
                                    <th width="80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($dtUlasan as $dt)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$dt->user->nama_lengkap??''}}</td>
                                    <td>{{$dt->buku->judul??''}}</td>
                                    <td>{{$dt->ulasan??''}}</td>
                                    <td>{{$dt->rating??''}}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('ulasan_buku.destroy', $dt->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                               <a class="modal-effect btn-sm btn btn-primary" data-bs-effect="effect-fall" data-bs-toggle="modal" href="#modaldemo8{{ $dt->id }}"><i class="fa fa-edit"></i></a>
                                           
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @include('ulasan_buku.modal_edit')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
                $('.select1').select2({ width: 'resolve' });
              
                
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
                "export_pdf_ulasan_buku?s="+s,
                    '_blank' // <- This is what makes it open in a new window.
                );
            }
        </script>
    



@endsection