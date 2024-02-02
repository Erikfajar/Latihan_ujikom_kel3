@extends('template_back.content')
@section('title', 'Dashboard')
@section('content')


<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Hi, welcome back! @auth {{ auth()->user()->nama_lengkap }} @endauth</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a   href="{{route('dashboard')}}">Dashboard</a></li>
                    <!-- <li class="breadcrumb-item active" aria-current="page">Project</li> -->
                </ol>
            </nav>
        </div>
        <div class="d-flex my-auto">
            <div class=" d-flex right-page">
                <!-- <div class="d-flex justify-content-center me-5">
                    <div class="">
                        <span class="d-block">
                            <span class="label ">EXPENSES</span>
                        </span>
                        <span class="value">
                            $53,000
                        </span>
                    </div>
                    <div class="ms-3 mt-2">
                        <span class="sparkline_bar"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="">
                        <span class="d-block">
                            <span class="label">PROFIT</span>
                        </span>
                        <span class="value">
                            $34,000
                        </span>
                    </div>
                    <div class="ms-3 mt-2">
                        <span class="sparkline_bar31"></span>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- main-content-body -->
    <div class="main-content-body">

        <div class="row row-sm">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card overflow-hidden project-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="my-auto">
                                <div class="me-4 ht-60 wd-60 my-auto primary">
                                    <img src="{{ asset('') }}images/svg/box.svg" width="100px" height="100px" class="ht-40 wd-60">
                                </div>
                            </div>
                            <div class="project-content">
                                <h6 class="card-title">Data Buku</h6>
                                <ul>
                                    <li>
                                        <strong>Total</strong>
                                        <span>{{$total_user}}</span>
                                      
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card  overflow-hidden project-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="my-auto">
                                <div class="me-4 ht-60 wd-60 my-auto warning">
                                <img src="{{ asset('') }}images/svg/tags-label.svg" width="100px" height="100px" class="ht-40 wd-60">
                                </div>
                            </div>
                            <div class="project-content">
                                <h6 class="card-title">Kategori buku </h6>
                                <ul>
                                    <li>
                                        <strong>Total</strong>
                                        <span>{{$total_kategoribuku_relasi}}</span>
                               
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card overflow-hidden project-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="my-auto">
                                <div class="me-4 ht-60 wd-60 my-auto danger">
                                <img src="{{ asset('') }}images/svg/cancel-delivery.svg" width="100px" height="100px" class="ht-40 wd-60">
                                </div>
                            </div>
                            <div class="project-content">
                                <h6 class="card-title">Data Peminjaman</h6>
                                <ul>
                                    <li>
                                        <strong>Total</strong>
                                        <span>{{$total_peminjaman}}</span>
                              
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card overflow-hidden project-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="my-auto">
                                <div class="me-4 ht-60 wd-60 my-auto success">
                                <img src="{{ asset('') }}images/svg/akun.svg" width="100px" height="100px" class="ht-40 wd-60">
                                </div>
                            </div>
                            <div class="project-content">
                                <h6 class="card-title">Data Pengembalian</h6>
                                <ul>
                                    <li>
                                        <strong>Total</strong>
                                        <span>-</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-body pd-y-7 pt-3">
                        <div id="grafik_kategoribarang" style="width:100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-body pd-y-7 pt-3">
                        <div id="grafik_rangeharga" style="width:100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-body pd-y-7 pt-3">
                        <div id="grafik_perbulan" style="width:100%"></div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>



@endsection