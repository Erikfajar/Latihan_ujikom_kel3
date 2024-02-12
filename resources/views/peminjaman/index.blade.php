@extends('template_back.content')
@section('title', 'Form Peminjaman Buku')
@section('content')
    
    <!-- container opened -->
    <div class="container">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div>
                <h4 class="content-title mb-2">Data Peminjaman Buku</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item text-white active">Data Peminjaman Buku</li>
                    </ol>
                </nav>
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
                                {{-- <a href="{{ route('data_buku.show') }}" class="btn btn-sm btn-info">+ Peminjam</a> --}}
                                <div class="d-flex my-auto btn-list justify-content-end">
                             
                                    <button onclick="formImport()" class="btn btn-sm btn-secondary"><i
                                            class="fa fa-upload me-2"></i> Import</button>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-success dropdown-toggle"
                                            data-bs-toggle="dropdown">
                                            <i class="fa fa-download me-2"></i>Export
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)"
                                                onclick="exportExcel()">Excel</a>
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
                                @foreach ($db as $key => $val)
                                <option value="{{$val->id}}" @if (request()->get('f1') == $val->id) selected @endif>{{$val->nama}}</option>
                                @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="tbl_list" class="table table-sm table-striped table-bordered tx-14" width="100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center" width="20px">No</th>
                                        <th style="text-align: center" width="50px">User</th>
                                        <th style="text-align: center" width="120px">Buku</th>
                                        <th style="text-align: center" width="120px">TGL Peminjaman</th>
                                        <th style="text-align: center" width="120px">TGL Pengembalian</th>
                                        <th style="text-align: center" width="80px">Status</th>
                                        <th style="text-align: center" width="50px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($dtPeminjam as $dt)
                                        <tr>
                                            <td style="text-align: center">{{ $no++ }}</td>
                                            <td style="text-align: center">{{ $dt->user->nama_lengkap ?? '' }}</td>
                                            <td style="text-align: center">{{ $dt->buku->judul ?? '' }}</td>
                                            <td style="text-align: center">{{ $dt->tanggal_peminjaman ?? '' }}</td>
                                            <td style="text-align: center">{{ $dt->tanggal_pengembalian ?? '' }}</td>
                                           
                                            <td style="text-align: center">{{ $dt->status_peminjaman ?? '' }}</td>
                                            <td style="text-align: center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('peminjaman.destroy', $dt->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="modal-effect btn btn-sm btn-primary"
                                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                        href="#modaldemo1{{ $dt->id }}"><i class="fa fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('peminjaman.modal_edit')
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
            $('.select2').select2({
                width: 'resolve'
            });

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
            var f1 = $('#f1').val();
            window.location.href = "data_barang?f1=" + f1;
        }

        function formImport() {
            $("#formImport")[0].reset();
            $("#mdl_formImport").modal('show');
        }

        function exportExcel() {
            var f1 = $('#f1').val();
            var s = $('.whatever').val();
            window.open(
                "data_barang/export_excel?s=" + s + "&f1=" + f1,
                '_blank' // <- This is what makes it open in a new window.
            );
        }

        function exportPdf() {
            var f1 = $('#f1').val();
            var s = $('.whatever').val();
            window.open(
                "data_barang/export_pdf?s=" + s + "&f1=" + f1,
                '_blank' // <- This is what makes it open in a new window.
            );
        }
        function exportPdf() {
            // var f1 = $('#f1').val();
            var s = $('.whatever').val();
            window.open(
                "export_pdf_peminjaman?s=" + s,
                '_blank' // <- This is what makes it open in a new window.
            );
        }
    </script>


@endsection
