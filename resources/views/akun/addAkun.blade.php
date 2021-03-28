@extends('layouts.layout')

@section('title')
    <title>Tambah Akun Baru</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="{{url('/showAkun')}}" class="breadcrumb-item">
            Kelola Akun
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Tambah Akun Baru
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
                            <h1 class="h4 page-head-title mb-4">Tambah Akun Baru</h1>
                        </div>
                        <form class="user" method="post" action="{{ url('addNewAkun') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user" id="exampleFirstName" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <label style="margin-left: 15px" for="roles" class="col-md-2 control-label">Roles</label>
                                <select style="width: 100px" name="roles" class="form-control" required="required">
                                    <option value="">...</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
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
