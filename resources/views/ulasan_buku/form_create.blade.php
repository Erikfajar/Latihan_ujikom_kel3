@extends('template_back.content')
@section('title', 'Form Ulasan buku')
@section('content')

<!-- container opened -->
<div class="container">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Form Input Ulasan Buku</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item text-white active">Buku</li>
                    <li class="breadcrumb-item text-white active">Form Ulasan Buku</li>
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
                        Form Ulasan Buku
                    </div>
                    <p class="mg-b-20">Silahkan isi form di bawah ini dengan lengkap.</p>
                    <!-- message info -->
                    @include('_component.message')
                    <div class="pd-10 pd-sm-20 bg-gray-100">
                        <form action="{{ route('ulasan_buku.store') }}" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Buku <span class="tx-danger">*</span></label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <select class="SlectBox form-control " name="buku_id" id="" >
                                                    <option  value="{{$dtBuku->id}}">{{ $dtBuku->judul}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Rating buku </label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <select class="SlectBox form-control " name="rating" id="" >
                                                    <option value="" disabled selected>Pilih Rating dari 1 sampai 10</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Ulasan Buku </label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                               <textarea class="form-control " placeholder="Masukan Ulasan Buku" name="ulasan" id="" cols="30" rows="10">{{old('ulasan_buku')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="float-right btn btn-primary pd-x-30 mg-e-5 mg-t-5">
                            <i class='fa fa-save'></i> Simpan</button>
                        <a href="{{ route('data_buku.index') }}" class="btn btn-secondary pd-x-30 mg-t-5">
                            <i class='fa fa-chevron-left'></i> Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

  
</div>
<!-- /container -->
                              

     

@endsection