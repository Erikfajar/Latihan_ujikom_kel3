@extends('template_back.content')
@section('title', 'Dashboard')
@section('content')

<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a   href="{{route('dashboard')}}">Dashboard</a></li>
                    <!-- <li class="breadcrumb-item active" aria-current="page">Project</li> -->
                </ol>
            </nav>
        </div>
        <div class="d-flex my-auto">
            <div class=" d-flex right-page">
             
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- main-content-body -->
    <div class="main-content-body">

      <!-- isi -->
    
    </div>
</div>

@endsection