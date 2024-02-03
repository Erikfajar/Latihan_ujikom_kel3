@extends('template_back.content')
@section('title', 'Data Kategori Buku')
@section('content')

    <!-- container opened -->
    <div class="container">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div>
                <h4 class="content-title mb-2">Data Kategori Buku</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item text-white active">Data Kategori Buku</li>
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
                                <p>Data Kategori Buku</p>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex my-auto btn-list justify-content-end">
                                    <a class="modal-effect btn-sm btn btn-primary" data-bs-effect="effect-rotate-bottom"
                                        data-bs-toggle="modal" href="#modaldemo8"><i class="fa fa-plus"></i> Tambah</a>
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
                   
                        <hr>
                        <div class="table-responsive">
                            <table id="tbl_list" class="table table-sm table-striped table-bordered tx-14" width="100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center" width="20px">No</th>
                                        <th style="text-align: center" width="120px">Nama Kategori</th>
                                        <th style="text-align: center" width="80px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($dtKategori as $dt)
                                        <tr>
                                            <td style="text-align: center">{{ $no++ }}</td>
                                            <td style="text-align: center">{{ $dt->nama_kategori ?? '' }}</td>
                                            <td style="text-align: center">
                                                <a class="modal-effect btn-sm btn btn-info"
                                                    data-bs-effect="effect-rotate-bottom" data-bs-toggle="modal"
                                                    href="#modaldemo8{{ $dt->id }}"><i class="fa fa-edit"
                                                        data-bs-toggle="tooltip" title="Update"></i></a>
                                                {{-- <a class="modal-effect btn-sm btn btn-info" data-bs-effect="effect-rotate-bottom" data-bs-toggle="modal" href="#modaldemo8{{ $dt->id }}"><i class="fa fa-edit"></i></a> --}}
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('kategori_buku.destroy', $dt->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash" data-bs-toggle="tooltip"
                                                            title="Delete"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('kategori_buku.modal_edit')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('kategori_buku.modal_create')

    </div>
    <!-- /container -->

    {{-- <script>
        $(function() {
            'use strict'
            // showing modal with effect
            $('.modal-effect').on('click', function(e) {
                e.preventDefault();
                var effect = $(this).attr('data-bs-effect');
                $('#modaldemo8{{ $dt->id }}').addClass(effect);
            });
            // hide modal with effect
            $('#modaldemo8{{ $dt->id }}').on('hidden.bs.modal', function(e) {
                $(this).removeClass(function(index, className) {
                    return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
                });
            });

        });
    </script> --}}


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
    </script>




@endsection
