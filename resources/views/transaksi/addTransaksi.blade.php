@extends('layouts.layout')

@section('title')
    <title>Tambah Transaksi Baru</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="{{url('/showTransaksi')}}" class="breadcrumb-item">
            Transaksi
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Tambah Supplier Baru
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
                            <h1 class="h4 page-head-title mb-4">Tambah Transaksi Baru</h1>
                        </div>
                        <form class="user" method="post" action="{{ url('addNewTransaction') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label style="margin-left: 3px" for="tanggal_transaksi" class="col-md-3 control-label">Tanggal Transaksi</label>
                                <input type="date" name="tanggal_transaksi" class="form-control form-control-user" id="exampleFirstName" placeholder="Tanggal Transaksi" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="number" name="harga" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Harga">
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" name="jumlah_produk" class="form-control form-control-user" id="exampleFirstName" placeholder="Jumlah Produk">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label style="margin-left: 15px" for="id_supplier" class="col-md-3 control-label">Produk</label><br>
                                    <select style="width: 250px" name="id_produk" class="form-control" required="required">
                                        <option value="">...</option>
                                        @foreach($getProdId as $row)
                                            <option value="{{ $row -> id }}">{{ $row -> id }} - {{ $row -> nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label style="margin-left: 15px" for="id_supplier" class="col-md-3 control-label">ID Sumber Data</label><br>
                                    <select style="width: 250px" name="id_sumberData" class="form-control" required="required">
                                        <option value="">...</option>
                                        @foreach($getSumberDataId as $row)
                                            <option value="{{ $row -> id }}">{{ $row -> id }} - {{ $row -> deskripsi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label style="margin-left: 15px" for="id_toko" class="col-md-3 control-label">Nama Toko</label><br>
                                    <select style="width: 250px" name="id_toko" class="form-control" required="required">
                                        <option value="">...</option>
                                        @foreach($getTokoId as $row)
                                            <option value="{{ $row -> id }}">{{ $row -> id }} - {{ $row -> nama_toko }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label style="margin-left: 15px" for="status" class="col-md-3 control-label">Status</label><br>
                                    <select style="width: 250px" name="status" class="form-control" required="required">
                                        <option value="">...</option>
                                        <option value="done">Done</option>
                                        <option value="on progress">On Process</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </div>
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
