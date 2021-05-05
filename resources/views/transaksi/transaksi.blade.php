@extends('layouts.layout')

@section('title')
    <title>Transaksi</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Transaksi
        </a>
    </div><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="page-head-title h3 mb-0">Transaksi</h1>
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
                <a href="{{url('addJemaatTornagodang')}}" class="btn btn-primary btn-icon-split btn-sm float-right btnAdd">
                    <span class="icon text-white">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Transaksi Baru</span>
                </a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Produk</th>
                        <th>Tanggal Transaksi</th>
                        <th>Harga</th>
                        <th>Nama Toko</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataTransaksi as $row)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $row -> product_id }}</td>
                        <td>{{ $row -> tanggal_transaksi }}</td>
                        <td>{{ $row -> harga }}</td>
                        <td>{{ $row -> nama_toko}}</td>
                        <td>
                            @if($row->status == 'done')
                                <div href="" class="btn btn-success" style="pointer-events: none">
                                    <i class="">Done</i>
                                </div>
                            @elseif($row->status == 'on progress')
                                <div href="" class="btn btn-dark" style="pointer-events: none">
                                    <i class="">On Process</i>
                                </div>
                            @else
                                <div href="" class="btn btn-danger" style="pointer-events: none">
                                    <i class="">Cancelled</i>
                                </div>
                            @endif
                        </td>
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
