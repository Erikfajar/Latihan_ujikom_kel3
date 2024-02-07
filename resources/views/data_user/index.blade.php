@extends('template_back.content')
@section('title', 'Data User')
@section('content')

    <!-- container opened -->
    <div class="container">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div>
                <h4 class="content-title mb-2">Data User</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item text-white active">Data User</li>
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
                                <p>Data User Yang Di Pending</p>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex my-auto btn-list justify-content-end">
                                    <a class="modal-effect btn-sm btn btn-info" data-bs-effect="effect-rotate-left"
                                        data-bs-toggle="modal" href="#modaldemo9"><i class="fa fa-plus"></i> Tambah</a>
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
                            <table  id="example3" class="table table-sm table-striped table-bordered tx-14" width="100%">
                                <thead>
                                    <tr>
                                        <th width="20px">No</th>
                                        <th width="50px">Username</th>
                                        <th width="50px">Email</th>
                                        <th width="120px">Nama Lengkap</th>
                                        <th width="120px">Hak Akses</th>
                                        <th width="120px">Alamat</th>

                                        <th width="80px" style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($dtUserPending as $dtPending)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $dtPending->username ?? '' }}</td>
                                            <td>{{ $dtPending->email ?? '' }}</td>
                                            <td>{{ $dtPending->nama_lengkap ?? '' }}</td>
                                            <td>{{ $dtPending->role ?? '' }}</td>
                                            <td>{{ $dtPending->alamat ?? '' }}</td>

                                            <td style="text-align: center">
                                                <form action="{{ route('data_user_confirm',$dtPending->id) }}" onsubmit="return confirm('Apakah anda yakin?')" method="post" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa fa-check fa-lg"></i></button>
                                                </form>
                                                <form action="" method="post" class="d-inline" onsubmit="return confirm('Apakah anda yakin?')">
                                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-times fa-lg"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="pd-t-10 pd-s-10 pd-e-10 bg-white bd-b">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Data User</p>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex my-auto btn-list justify-content-end">
                                    <a class="modal-effect btn-sm btn btn-info" data-bs-effect="effect-rotate-left"
                                        data-bs-toggle="modal" href="#modaldemo9"><i class="fa fa-plus"></i> Tambah</a>
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
                            <table id="responsive-datatable" class="table table-sm table-striped table-bordered tx-14" width="100%">
                                <thead>
                                    <tr>
                                        <th width="20px">No</th>
                                        <th width="50px">Username</th>
                                        <th width="50px">Email</th>
                                        <th width="120px">Nama Lengap</th>
                                        <th width="120px">Alamat</th>

                                        <th width="80px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($dtUser as $dt)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $dt->username ?? '' }}</td>
                                            <td>{{ $dt->email ?? '' }}</td>
                                            <td>{{ $dt->nama_lengkap ?? '' }}</td>
                                            <td>{{ $dt->alamat ?? '' }}</td>

                                            <td>
                                                <a class="modal-effect btn-sm btn btn-info"
                                                    data-bs-effect="effect-rotate-left" data-bs-toggle="modal"
                                                    href="#modaldemo9{{ $dt->id }}"><i class="fa fa-edit"></i></a>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('data_user.destroy', $dt->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('data_user.modal_edit')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('data_user.modal_create')

    </div>
    <!-- /container -->

    {{-- <script>
    $(function () {
	'use strict'
	// showing modal with effect
	$('.modal-effect').on('click', function (e) { 
		e.preventDefault();
		var effect = $(this).attr('data-bs-effect');
		$('#modaldemo9{{ $dt->id }}').addClass(effect);
	});
	// hide modal with effect
	$('#modaldemo9{{ $dt->id }}').on('hidden.bs.modal', function (e) {
		$(this).removeClass(function (index, className) {
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
