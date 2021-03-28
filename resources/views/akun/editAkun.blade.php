@extends('layouts.layout')

@section('title')
    <title>Edit Akun</title>
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
            Edit Akun
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
                            <h1 class="h4 page-head-title mb-4">Edit Akun</h1>
                        </div>
                        <form class="user" method="post" action="/updateAkun/{{ $dataAkun -> id }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="dataID" value="{{ $dataAkun -> id }}">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName" placeholder="Username" value="{{ $dataAkun -> username }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="password" class="form-control form-control-user" id="exampleFirstName" placeholder="Password" value="{{ $dataAkun -> password }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama" value="{{ $dataAkun -> nama }}">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label style="margin-left: 15px" for="roles" class="col-md-2 control-label">Roles</label>
                                    <select style="width: 100px" name="roles" class="form-control" required="required">
                                        @if($dataAkun->roles == 'admin')
                                        <option value="">...</option>
                                        <option value="admin" selected>Admin</option>
                                        <option value="user">User</option>
                                        @else
                                            <option value="">...</option>
                                            <option value="admin">Admin</option>
                                            <option value="user" selected>User</option>
                                        @endif
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
