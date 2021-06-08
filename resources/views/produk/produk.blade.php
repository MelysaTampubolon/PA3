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
                            <td>RP {{number_format($row -> harga)}}</td>
                            <td style="white-space: nowrap">
                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$row->id}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="editProduk/{{ $row->id }}" class="btn btn-info">
                                    <i class="fas fa-edit"></i>
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
                                    <div class="modal-body">Hapus {{$row->nama_produk}}?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <a href="deleteProduk/{{ $row->id }}" class="btn btn-primary">Hapus</a>
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
