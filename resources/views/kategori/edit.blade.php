@extends('dashboard.sidebar')
@section('konten')

<div class="container">
           
  <div class="row">
      
      <div class="col-sm-12">
          <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="{{ route('kategori.index') }}" role="tab" aria-controls="overview" aria-selected="false">List Kategori</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="{{ route('kategori.create') }}" role="tab" aria-selected="true">Add Kategori</a>
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
                          <h2><b class="row justify-content-center">Edit Kategori</b></h2>
                          </br>
                      </div>
                  </div>

                      <!-- Konten -->
                      <div class="row justify-content-center">
                        <div class="col-md-8">
                          <div class="card">
                            <div class="card-body">
                            
                            <form action="{{ url('kategori/' .$kategori->id_kategori) }}" method="post">
                              {!! csrf_field() !!}
                              @method("PATCH")
                              <input type="hidden" name="id_kategori" id="id_kategori" value="{{$kategori->id_kategori}}" id="id" />
                              <label>Id Kategori</label></br>
                              <input type="text" name="kode_kategori" disabled="disabled" id="kode_kategori" value="{{$kategori->kode_kategori}}" class="form-control"></br>
                              <label>Nama</label></br>
                              <input type="text" name="nama_kategori" id="nama_kategori" value="{{$kategori->nama_kategori}}" class="form-control"></br>
                             <input type="submit" value="Update" class="btn btn-primary">
                              <span style="float: center">
                              <a class="btn btn-secondary" href="{{ route('kategori.index') }}"> Cancel</a>
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