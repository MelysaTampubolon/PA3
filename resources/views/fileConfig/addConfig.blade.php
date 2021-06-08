@extends('layouts.layout')

@section('title')
    <title>Tambah File Config Baru</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="{{url('/showConfig')}}" class="breadcrumb-item">
            File Config
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Tambah File Config
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
                            <h1 class="h4 page-head-title mb-4">Tambah File Config</h1>
                        </div>
                        <form class="user" method="post" action="{{ url('addNewConfig') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="nama_file" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama File" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label style="margin-left: 15px" for="id_supplier" class="col-md-3 control-label">Supplier</label>
                                    <select style="width: 250px" name="id_supplier" class="form-control" required="required">
                                        <option value="">...</option>
                                        @foreach($getSupplier as $row)
                                            <option value="{{ $row -> id }}">{{ $row -> id }} - {{ $row -> nama_toko }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
