@extends('layouts.template')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Beranda</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="feather icon-home"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card" style="height:75px">
        <h2 class="text-muted m-b-0" style="margin-left:20px;margin-top:15px;">Selamat Datang, {{ Auth::user()->name }}</h2>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-12">
            <!-- support-section start -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-blue">10</h4>
                                    <h6 class="text-muted m-b-0">Total Sampah</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="bi bi-speaker f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-blue btn">
                            <a href="#">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h6 class="text-white m-b-0">Lihat</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
            <!-- support-section end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
@endsection
