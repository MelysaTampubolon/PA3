@extends('layouts.layout')

@section('title')
    <title>Toko Online</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Toko Online
        </a>
    </div><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="page-head-title h3 mb-0">Toko Online</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{url('addJemaatTornagodang')}}" class="btn btn-primary btn-icon-split btn-sm float-right btnAdd">
                    <span class="icon text-white">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Toko Baru</span>
                </a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Toko</th>
                        <th>Platform</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($dataToko as $row)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row['nama_toko'] }}</td>
                            <td>{{ $row['nama_platfonm'] }}</td>
                            <td style="white-space: nowrap">
                                <button href="" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button href="" class="btn btn-info">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
