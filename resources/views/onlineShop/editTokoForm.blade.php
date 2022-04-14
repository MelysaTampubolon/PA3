@extends('layouts.layout')

@section('title')
    <title>Edit Toko</title>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <a href="{{url('/')}}" class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i>Dashboard
        </a>
        <a href="{{url('/showShop')}}" class="breadcrumb-item">
            Toko Online
        </a>
        <a href="" class="breadcrumb-item active" onclick="return false">
            Edit Toko
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
                            <h1 class="h4 page-head-title mb-4">Edit Toko</h1>
                        </div>
                        <form class="user" method="post" action="/updateToko/{{$dataToko->id}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$dataToko->id}}" name="dataID">
                            <div class="form-group">
                                <input type="text" name="nama_toko" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Toko" value="{{$dataToko->nama_toko}}">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label style="margin-left: 15px" for="nama_platform" class="col-md-2 control-label">Nama Platform</label>
                                    <select style="width: 150px" name="nama_platform" class="form-control" required="required">
                                        @if($dataToko->nama_platform == 'tokopedia')
                                            <option value="">...</option>
                                            <option value="tokopedia" selected>Tokopedia</option>
                                            <option value="shopee">Shopee</option>
                                            <option value="bukalapak">BukaLapak</option>
                                        @elseif($dataToko->nama_platform == 'shopee')
                                            <option value="">...</option>
                                            <option value="tokopedia" >Tokopedia</option>
                                            <option value="shopee" selected>Shopee</option>
                                            <option value="bukalapak">BukaLapak</option>
                                        @else
                                            <option value="">...</option>
                                            <option value="tokopedia">Tokopedia</option>
                                            <option value="shopee">Shopee</option>
                                            <option value="bukalapak" selected>BukaLapak</option>
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
