@extends('dashboard.sidebar')
@section('konten')

<div class="container">
           
    <div class="row">
        
        <div class="col-sm-12">
            <div class="home-tab">
              <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="{{ route('pelanggan.index') }}" role="tab" aria-controls="overview" aria-selected="false">List Member</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="{{ route('pelanggan.create') }}" role="tab" aria-selected="true">Add Member</a>
                  </li>
                </ul>
                <div>
                  <div class="btn-wrapper">
                    <a class="btn btn-primary"><i class="fas fa-fw fa-user"></i></a>
                  </div>
                </div>
              </div>
  
                    <div class="container-fluid">
                        <div class="col-sm-12">
                            <br>
                            <h2><b class="row justify-content-center">Member</b></h2>
                            </br>
                        </div>
                    </div>

                    <!-- Konten -->
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">

                                <div class="card-body">
                                    <h5 class="badge badge-success">Kode ID : {{ $pelanggan->kode_member }}</h5>
                                    <p class="card-text">Nama : {{ $pelanggan->nama }}</p>
                                    <p class="card-text">No Telp : {{ $pelanggan->telepon }}</p>
                                    <p class="card-text">Alamat : {{ $pelanggan->alamat }}</p>
                                    <span style="float: right">
                                    <a class="btn btn-primary" href="{{ route('pelanggan.index') }}"> Back</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </br>
                    <!-- End -->
            </div>
        </div>
    </div>
</div>

@endsection