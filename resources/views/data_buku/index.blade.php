@extends('template_back.content')
@section('title', 'Data Buku')
@section('content')

    <!-- container opened -->
    <div class="container">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div>
                <h4 class="content-title mb-2">Data Buku</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item text-white active">Data Buku</li>
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
                                <p>Data Buku</p>
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
                                            <a class="dropdown-item" href="javascript:void(0)"  onclick="exportPdf()">PDF</a>
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
                            <table id="responsive-datatable" class="table table-sm table-striped table-bordered tx-14" width="100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center" width="20px">No</th>
                                        <th style="text-align: center" width="50px">Judul</th>
                                        <th style="text-align: center" width="50px">Penulis</th>
                                        <th style="text-align: center" width="120px">Penerbit</th>
                                        <th style="text-align: center" width="80px">Tahun Terbit</th>
                                        <th style="text-align: center" width="120px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($dtBuku as $dt)
                                        <tr>
                                            <td style="text-align: center">{{ $no++ }}</td>
                                            <td style="text-align: center">{{ $dt->judul ?? '' }}</td>
                                            <td style="text-align: center">{{ $dt->penulis ?? '' }}</td>
                                            <td style="text-align: center">{{ $dt->penerbit ?? '' }}</td>
                                            <td style="text-align: center">{{ $dt->tahun_terbit ?? '' }}</td>
                                            {{-- <td>{{isset($dt->created_at)?$Tanggal->ind($dt->created_at??'','/'):''}}</td> --}}
                                            <td style="text-align: center">
                                                <a class="modal-effect btn-sm btn btn-info"
                                                    data-bs-effect="effect-rotate-bottom" data-bs-toggle="modal"
                                                    href="#modaldemo8{{ $dt->id }}"><i class="fa fa-edit"
                                                        data-bs-toggle="tooltip" title="Update"></i></a>
                                                {{-- <a class="modal-effect btn-sm btn btn-info" data-bs-effect="effect-rotate-bottom" data-bs-toggle="modal" href="#modaldemo8{{ $dt->id }}"><i class="fa fa-edit"></i></a> --}}
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('data_buku.destroy', $dt->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash" data-bs-toggle="tooltip"
                                                            title="Delete"></i></button>

                                                    <a href="{{ route('peminjaman.show', $dt->id) }}"
                                                        class="btn btn-sm btn-warning"><i class="ti-agenda"
                                                            data-bs-toggle="tooltip" title="Pinjam Buku"></i></a>
                                                    <a href="{{ route('ulasan_buku.show', $dt->id) }}"
                                                        class="btn btn-sm btn-secondary"><i class="fab fa-twitch"
                                                            data-bs-toggle="tooltip" title="Ulasan Buku"></i></a>
                                                          
                                                
                                                </form>
                                                <form class="d-inline"  onsubmit="return confirm('Apakah Anda Yakin Mau Menambahkan Ke Daftar Koleksi?')" action="{{ route('kolekasi_pribadi_simpan',$dt->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success"><i
                                                        class="far fa-thumbs-up" data-bs-toggle="tooltip"
                                                        title="Koleksi Pribadi"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('data_buku.modal_edit')
                                    @endforeach
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
            // var f1 = $('#f1').val();
            var s = $('.whatever').val();
            window.open(
                "export_pdf_buku?s=" + s,
                '_blank' // <- This is what makes it open in a new window.
            );
        }
    </script>




@endsection
