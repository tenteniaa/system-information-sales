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
                          <h2><b class="row justify-content-center">Edit Member</b></h2>
                          </br>
                      </div>
                  </div>

                      <!-- Konten -->
                      <div class="row justify-content-center">
                        <div class="col-md-8">
                          <div class="card">
                            <div class="card-body">
                            
                            <form action="{{ url('pelanggan/' .$pelanggan->id_member) }}" method="post">
                              {!! csrf_field() !!}
                              @method("PATCH")
                              <input type="hidden" name="id_member" id="id_member" value="{{$pelanggan->id_member}}" id="id" />
                              <label>Kode ID</label></br>
                              <input type="text" name="kode_member" disabled="disabled" id="kode_member" value="{{$pelanggan->kode_member}}" class="form-control"></br>
                              <label>Nama</label></br>
                              <input type="text" name="nama" id="nama" value="{{$pelanggan->nama}}" class="form-control"></br>
                              <label>No Telp</label></br>
                              <input type="text" name="telepon" id="telepon" value="{{$pelanggan->telepon}}" class="form-control"></br>
                              <label>Alamat</label></br>
                              <input type="text" name="alamat" id="alamat" value="{{$pelanggan->alamat}}" class="form-control"></br>
                              <input type="submit" value="Update" class="btn btn-primary">
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