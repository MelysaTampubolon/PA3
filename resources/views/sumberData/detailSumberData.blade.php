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
                    <td>JTAC213BLK</td>
                </tr>
                <tr>
                    <th>Tanggal Fetch Produk</th>
                    <td>:</td>
                    <td>2011/04/25</td>
                </tr>
                <tr>
                    <th>Supplier</th>
                    <td>:</td>
                    <td>jamTangan.com</td>
                </tr>
                <tr>
                    <th>File Config</th>
                    <td>:</td>
                    <td>jamTangan_detail.py</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbarui Oleh</th>
                    <td>:</td>
                    <td>Alvin Simbolon - admin</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbaharui</th>
                    <td>:</td>
                    <td>2011/04/25</td>
                </tr>
                <tr>
                    <th style="vertical-align: text-top">Deskripsi</th>
                    <td style="vertical-align: text-top">:</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad alias dolor doloribus esse est ex harum illum itaque modi nemo,
                        perferendis quae, qui, quis quo rerum sapiente sequi vero vitae.</td>
                </tr>
            </table>
            <br>
        </div>
    </div>

@endsection
