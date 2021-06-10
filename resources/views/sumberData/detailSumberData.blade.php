@extends('layouts.layout')

@section('title')
    <title>Detail Sumber Data Barang</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="{{(url('/sumberData'))}}" class="breadcrumb-item">
            Sumber Data Barang
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Detail Sumber Data Barang
        </a>
    </div><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="page-head-title h3 mb-0">Detail Sumber Data Barang</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <br>
            <table width="75%" class="detailTable">
                <tr>
                    <th width="200px">ID Sumber Data</th>
                    <td>:</td>
                    <td>{{ $dataRiwayat -> id }}</td>
                </tr>
                <tr>
                    <th>Tanggal Fetch Produk</th>
                    <td>:</td>
                    <td>{{ $dataRiwayat -> tanggal_fetch }}</td>
                </tr>
                @foreach($otherData as $row)
                    <tr>
                        <th>Supplier</th>
                        <td>:</td>
                        <td>{{ $row -> nama_toko }}</td>
                    </tr>
                    <tr>
                        <th>File Config</th>
                        <td>:</td>
                        <td>{{ $row -> nama_file }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diperbarui Oleh</th>
                        <td>:</td>
                        <td>{{ $row -> nama }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th>Terakhir Diperbaharui</th>
                    <td>:</td>
                    <td>{{ $dataRiwayat -> updated_at }}</td>
                </tr>
                <tr>
                    <th style="vertical-align: text-top">Deskripsi</th>
                    <td style="vertical-align: text-top">:</td>
                    <td>{{ $dataRiwayat -> deskripsi }}</td>
                </tr>
            </table>
            <br>
            <div class="" style="margin-left: 385px">
                <a href="/exportToped/{{ $dataRiwayat -> id }}" class="btn btn-success" id="exportBtn">Download Format Tokopedia</a><br>
                <a href="/exportShopee/{{ $dataRiwayat -> id }}" class="btn btn-warning" id="exportBtn" style="margin-top: 5px;">Download Format Shopee</a><br>
                <a href="" class="btn btn-danger" id="exportBtn" style="margin-top: 5px">Download Format BukaLapak</a>
            </div>
            <br>
        </div>
    </div>

@endsection
