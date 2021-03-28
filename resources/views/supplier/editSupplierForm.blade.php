@extends('layouts.layout')

@section('title')
    <title>Edit Supplier</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="{{url('/showSupplier')}}" class="breadcrumb-item">
            Supplier
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Edit Supplier
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
                            <h1 class="h4 page-head-title mb-4">Edit Supplier</h1>
                        </div>
                        <form class="user" method="post" action="/updateSupplier/{{$dataSupplier->id}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="dataID" value="{{ $dataSupplier->id }}">
                            <div class="form-group">
                                <input type="text" name="link" class="form-control form-control-user" id="exampleFirstName" placeholder="URL Toko" value="{{ $dataSupplier->link }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama_toko" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Toko" value="{{$dataSupplier->nama_toko}}">
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
