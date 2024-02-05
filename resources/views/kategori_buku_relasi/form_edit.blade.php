@extends('template_back.content')
@section('title', 'Form Kategori Buku Relasi')
@section('content')

    <!-- container opened -->
    <div class="container">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div>
                <h4 class="content-title mb-2">Form Edit Kategori Buku Relasi</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item text-white active">Kategori Buku Relasi</li>
                        <li class="breadcrumb-item text-white active">Form Kategori Buku Relasi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /breadcrumb -->
        <div class="row row-sm">
            <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Form Kategori Buku Relasi
                        </div>
                        <p class="mg-b-20">Silahkan isi form di bawah ini dengan lengkap.</p>
                        <!-- message info -->
                        @include('_component.message')
                        <div class="pd-10 pd-sm-20 bg-gray-100">
                            <form action="{{ route('kategori_buku_relasi.update', $dt->id) }}" method="post">
                                @csrf @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row row-xs align-items-center mg-b-20">
                                                    <div class="col-md-3">
                                                        <label class="form-label mg-b-0">Kategori Buku </label>
                                                    </div>
                                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                        <select name="kategori_id" class="form-control select2"
                                                            id="">
                                                            <option value="{{ $dt->kategori_id }}" selected>
                                                                {{ $dt->kategori->nama_kategori }}</option>
                                                            @foreach ($dtKategori as $dtKategori)
                                                                <option value="">Pilih Kategori Buku</option>
                                                                <option value="{{ $dtKategori->id }}">
                                                                    {{ $dtKategori->nama_kategori }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row row-xs align-items-center mg-b-20">
                                                    <div class="col-md-3">
                                                        <label class="form-label mg-b-0">Buku </label>
                                                    </div>
                                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                        <select name="buku_id" class="form-control select2" id="">
                                                            <option value="{{ $dt->buku_id }}" selected>
                                                                {{ $dt->buku->judul }}</option>
                                                            @foreach ($dtBuku as $dtBuku)
                                                                <option value="">Pilih Buku</option>
                                                                <option value="{{ $dtBuku->id }}">{{ $dtBuku->judul }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="float-right btn btn-primary pd-x-30 mg-e-5 mg-t-5">
                                    <i class='fa fa-save'></i> Simpan</button>
                                <a href="{{ route('kategori_buku_relasi.index') }}"
                                    class="btn btn-secondary pd-x-30 mg-t-5">
                                    <i class='fa fa-chevron-left'></i> Kembali</a>
                            </form>
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
    </script>

@endsection
