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
                  <a class="nav-link active ps-0" id="profile-tab" data-bs-toggle="tab" href="{{ route('pelanggan.create') }}" role="tab" aria-selected="true">Add Member</a>
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
                          <h2><b class="row justify-content-center">Tambah Member</b></h2>
                          </br>
                      </div>
                  </div>

                  <!-- Konten -->
                  <div class="row justify-content-center">
                    <div class="col-md-8">
                      <div class="card">
                        <div class="card-body">

                        <form action="{{ route('pelanggan.store') }}" method="post">
                          {!! csrf_field() !!}
                          <label>Kode ID</label></br>
                          <input type="text" name="kode_member" id="kode_member" class="form-control"></br>
                          <label>Nama</label></br>
                          <input type="text" name="nama" id="nama" class="form-control"></br>
                          <label>No Telp</label></br>
                          <input type="text" name="telepon" id="telepon" class="form-control"></br>
                          <label>Alamat</label></br>
                          <input type="text" name="alamat" id="alamat" class="form-control"></br>
                          <input type="submit" value="Save" class="btn btn-primary">
                          <span style="float: center">
                          <a class="btn btn-secondary" href="{{ route('pelanggan.index') }}"> Cancel</a>
                        </form>
                    
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
 
@stop