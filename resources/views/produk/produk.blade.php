@extends('layouts.layout')

@section('title')
    <title>Produk</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Produk
        </a>
    </div><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="page-head-title h3 mb-0">Produk</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>
                    {{$message}}
                </p>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="width: 20px">#</th>
                        <th style="width: 100px">Kode Produk</th>
                        <th>Nama Produk</th>
                        <th style="width: 30px">Stok</th>
                        <th style="width: 150px">Harga</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataProduk as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$row -> id}}</td>
                            <td>{{$row -> nama_produk}}</td>
                            <td>{{$row -> stok}}</td>
                            <td>RP. {{$row -> harga}}</td>
                            <td style="white-space: nowrap">
                                <button href="" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button href="" class="btn btn-info">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
