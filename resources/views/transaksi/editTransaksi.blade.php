@extends('layouts.layout')

@section('title')
    <title>Edit Supplier</title>
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
            Edit Transaksi
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
                            <h1 class="h4 page-head-title mb-4">Edit Transaksi</h1>
                        </div>
                        <form class="user" method="post" action="/updateTransaksi/{{$dataTransaksi->id}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="dataID" value="{{ $dataTransaksi->id }}">
{{--                            <div class="form-group">--}}
{{--                                <input type="date" name="tanggal_transaksi" class="form-control form-control-user" id="exampleFirstName" placeholder="URL Toko" value="{{ $dataTransaksi->tanggal_transaksi }}">--}}
{{--                            </div>--}}
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="number" name="harga" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Harga" value="{{ $dataTransaksi->harga }}">
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" name="jumlah_produk" class="form-control form-control-user" id="exampleFirstName" placeholder="Jumlah Produk" value="{{ $dataTransaksi->jumlah_produk }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="margin-left: 1px" for="nama_produk" class="col-md-3 control-label">Produk</label><br>
                                <select style="width: 450px" name="nama_produk" class="form-control" required="required">
                                    <option value="{{ $dataTransaksi->product_id }}">{{ $dataTransaksi->product_id }}</option>
                                    @foreach($dataProd as $row)
                                        <option value="{{ $row -> id }}">{{ $row -> id }} - {{ $row -> nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label style="margin-left: 1px" for="toko_id" class="col-md-3 control-label">Toko</label><br>
                                <select style="width: 450px" name="toko_id" class="form-control" required="required">
                                    <option value="{{ $dataTransaksi->toko_id }}">{{ $dataTransaksi->toko_id }}</option>
                                    @foreach($dataToko as $row)
                                        <option value="{{ $row -> id }}">{{ $row -> id }} - {{ $row -> nama_toko }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label style="margin-left: 1px" for="riwayat_id" class="col-md-3 control-label">Sumber Data</label><br>
                                <select style="width: 450px" name="riwayat_id" class="form-control" required="required">
                                    <option value="{{ $dataTransaksi->riwayat_id }}">{{ $dataTransaksi->riwayat_id }}</option>
                                    @foreach($dataRiwayat as $row)
                                        <option value="{{ $row -> id }}">{{ $row -> id }} - {{ $row -> deskripsi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label style="margin-left: 1px" for="status" class="col-md-3 control-label">Status</label><br>
                                <select style="width: 450px" name="status" class="form-control" required="required">
                                    @if($dataTransaksi->status == 'done')
                                        <option value="done">Done</option>
                                        <option value="done">Done</option>
                                        <option value="on progress">On Process</option>
                                        <option value="cancelled">Cancelled</option>
                                    @elseif($dataTransaksi->status == 'on progress')
                                        <option value="on progress">On Process</option>
                                        <option value="done">Done</option>
                                        <option value="on progress">On Process</option>
                                        <option value="cancelled">Cancelled</option>
                                    @else
                                        <option value="cancelled">Cancelled</option>
                                        <option value="done">Done</option>
                                        <option value="on progress">On Process</option>
                                        <option value="cancelled">Cancelled</option>
                                    @endif
                                </select>
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
