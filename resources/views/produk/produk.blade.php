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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>ID Sumber Data</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    {{--                    <tfoot>--}}
                    {{--                    <tr>--}}
                    {{--                        <th>Nama File</th>--}}
                    {{--                        <th>Tanggal Fetch Produk</th>--}}
                    {{--                        <th>Supplier</th>--}}
                    {{--                        <th>File Config</th>--}}
                    {{--                        <th>Aksi</th>--}}
                    {{--                    </tr>--}}
                    {{--                    </tfoot>--}}
                    <tbody>
                    <tr>
                        <td>JT001BLK</td>
                        <td>Alexandre Christie AC 6323 MC Black</td>
                        <td>7</td>
                        <td>RP. 1.137.000</td>
                        <td>AC213</td>
                        <td style="white-space: nowrap">
                            <button href="" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button href="" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
