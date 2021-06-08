@extends('layouts.layout')

@section('title')
    <title>Sumber Data Barang</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Sumber Data Barang
        </a>
    </div><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="page-head-title h3 mb-0">Sumber Data Barang</h1>
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
                <a href="{{url('addSumberData')}}" class="btn btn-primary btn-icon-split btn-sm float-right btnAdd">
                    <span class="icon text-white">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Baru</span>
                </a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Sumber Data</th>
                        <th>Tanggal Fetch Produk</th>
                        <th>Supplier</th>
                        <th>File Config</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sumberData as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="/detailSumberData/{{ $row->id }}">
                                    {{ $row -> id }}
                                </a>
                            </td>
                            <td>{{ $row -> tanggal_fetch }}</td>
                            <td>{{ $row -> nama_toko }}</td>
                            <td>{{ $row -> nama_file }}</td>
                            <td>
                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$row->id}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        <div class="modal fade" id="deleteModal-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Hapus Data?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <a href="deleteSumberData/{{ $row->id }}" class="btn btn-primary">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
