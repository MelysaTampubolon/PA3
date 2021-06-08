@extends('layouts.layout')

@section('title')
    <title>Edit Supplier</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="{{url('/showProduk')}}" class="breadcrumb-item">
            Produk
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Edit Produk
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            @if($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>
                        {{$message}}
                    </p>
                </div>
        @endif
        <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 page-head-title mb-4">Edit Produk</h1>
                        </div>
                        <form class="user" method="post" action="/updateProduk/{{$dataProduk->id}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="dataID" value="{{ $dataProduk->id }}">
                            <div class="form-group">
                                <label style="margin-left: 15px" for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Produk" value="{{ $dataProduk->nama_produk }}">
                            </div>
                            <div class="form-group">
                                <label style="margin-left: 15px" for="url_produk">URL Produk</label>
                                <input type="text" name="url_produk" class="form-control form-control-user" id="exampleFirstName" placeholder="URL Produk" value="{{$dataProduk->url_produk}}">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label style="margin-left: 15px" for="harga">Harga</label>
                                    <input type="number" name="harga" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Jumlah Jemaat" value="{{$dataProduk->harga}}">
                                </div>
                                <div class="col-sm-6">
                                    <label style="margin-left: 15px" for="stok">Stok</label>
                                    <input type="text" name="stok" class="form-control form-control-user" id="exampleFirstName" placeholder="Stok" value="{{$dataProduk->stok}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="margin-left: 15px" for="url_produk">URL Gambar Produk</label>
                                <input type="text" name="url_gambar" class="form-control form-control-user" id="exampleFirstName" placeholder="URL Produk" value="{{$dataProduk->gambar}}">
                            </div>
                            <br><br><br>
                            <button type="submit" href="#" class="btn btn-primary btn-user btn-block">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
