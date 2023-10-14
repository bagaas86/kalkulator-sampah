@extends('layouts.template')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Tambah Data Sampah</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Data Sampah</a></li>
                        <li class="breadcrumb-item"><a href="#!">Tambah Data Sampah</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif
    <div class="card">
        <div class="xformdm">
            <center>
                <h5>Tambah Data Sampah</h5>
            </center>
            <div class="form mt-4">
                <form enctype="multipart/form-data" action="{{ route('sampah.store') }}" method="POST">
                    @csrf
                    <input type="text" name="id_item" value="{{ $id_item }}" hidden>
                    <div class="row">
                        <div class="col col-md-8 col-12">
                            <div class="form-group">
                                <label for="nama_sampah">Nama Sampah</label><small
                                    style="color:red;font-size:12px">*</small>
                                <input type="text" class="form-control @error('nama_sampah') is-invalid @enderror"
                                    id="nama_sampah" name="nama_sampah" placeholder="Masukkan Nama Sampah"
                                    value="{{ old('nama_sampah') }}">
                                @error('nama_sampah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>
                        </div>
                        <div class="col col-md-4 col-12">
                            <div class="form-group">
                                <label for="harga_sampah">Harga Sampah (Kg)</label><small
                                    style="color:red;font-size:12px">*</small>
                                <input type="number" class="form-control @error('harga_sampah') is-invalid @enderror"
                                    id="harga_sampah" name="harga_sampah" placeholder="Harga Sampah per Kilogram"
                                    value="{{ old('harga_sampah') }}">
                                @error('harga_sampah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col col-md-12 col-12">
                            <div class="form-group">
                                <label for="deskripsi_sampah">Deskripsi Sampah</label><small
                                    style="color:red;font-size:12px">*</small>
                                <textarea type="text" class="form-control @error('deskripsi_sampah') is-invalid @enderror" id="deskripsi_sampah"
                                    name="deskripsi_sampah" placeholder="Deskripsi Sampah...">{{ old('deskripsi_sampah') }}</textarea>
                                @error('deskripsi_sampah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col col-md-12 col-12">
                            <div class="form-group">
                                <label for="deskripsi_barang">Foto Sampah</label>
                                <input type="file" class="form-control @error('foto_sampah') is-invalid @enderror"
                                    name="foto_sampah" value="{{ old('foto_sampah') }}">
                                @error('foto_sampah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
