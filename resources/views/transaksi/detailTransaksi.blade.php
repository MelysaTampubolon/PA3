@extends('layouts.layout')

@section('title')
    <title>Detail Sumber Data Barang</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="{{(url('/showTransaksi'))}}" class="breadcrumb-item">
            Transaksi
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Detail Transaksi
        </a>
    </div><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="page-head-title h3 mb-0">Detail Transaksi</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <br>
            <table width="75%" class="detailTable">
                <tr>
                    <th width="200px">Kode Transaksi</th>
                    <td>:</td>
                    <td>{{ $dataTransaksi -> id }}</td>
                </tr>
                <tr>
                    <th width="200px">Kode - Nama Produk</th>
                    <td>:</td>
                    <td>{{ $dataTransaksi -> product_id }} - {{ $otherData -> nama_produk }}</td>
                </tr>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <td>:</td>
                    <td>{{ $dataTransaksi -> tanggal_transaksi }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>:</td>
                    <td>Rp {{ number_format($dataTransaksi -> harga) }}</td>
                </tr>
                <tr>
                    <th>Jumlah Pesanan</th>
                    <td>:</td>
                    <td>{{ $dataTransaksi -> jumlah_produk }}</td>
                </tr>
                <tr>
                    <th>Nama Toko</th>
                    <td>:</td>
                    <td>{{ $dataTransaksi -> toko_id }} - {{ $otherData -> nama_toko }}</td>
                </tr>
                <tr>
                    <th>ID Sumber Data</th>
                    <td>:</td>
                    <td>{{ $dataTransaksi -> riwayat_id }} - {{ $otherData -> deskripsi }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>:</td>
                    <td>
                        @if($dataTransaksi -> status == 'done')
                            <div href="" class="btn btn-success" style="pointer-events: none">
                                <i class="">Done</i>
                            </div>
                        @elseif($dataTransaksi -> status == 'on progress')
                            <div href="" class="btn btn-dark" style="pointer-events: none">
                                <i class="">On Process</i>
                            </div>
                        @else
                            <div href="" class="btn btn-danger" style="pointer-events: none">
                                <i class="">Cancelled</i>
                            </div>
                        @endif
                    </td>
                </tr>
            </table>
            <br>
        </div>
    </div>

@endsection
