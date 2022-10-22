@extends('dashboard.sidebar')
@section('konten')

<div class="container">           
  <div class="row">
    <div class="col-sm-12">
      <div class="home-tab">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="{{ route('produk.index') }}" role="tab" aria-controls="overview" aria-selected="false">List Produk</a>
                <li class="nav-item">
              <a class="nav-link active ps-0" id="profile-tab" data-bs-toggle="tab" href="{{ route('produk.create') }}" role="tab" aria-selected="true">Add Produk</a>
            </li>
          </ul>
          <div>
            <div class="btn-wrapper">
              <a class="btn btn-primary"><i class="fas fa-fw fa-cubes"></i></a>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="container-fluid">
                  <div class="col-sm-12">
                    <br>
                    <h2><b class="row justify-content-center">Tambah Produk</b></h2>
                    </br>
                  </div>
                </div>
                <!-- Konten -->
                <div class="row justify-content-center">
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-body">
                        <form action="{{ route('produk.store') }}" method="post">
                          {!! csrf_field() !!}
                          <label>ID Produk</label></br>
                          <input type="text" name="id_produk" id="id_produk" class="form-control"></br>
                          <select name="id_kategori" id="id_kategori" class="form-control select2" style="width:100%">
                            <option disable value>Pilih Kategori</option>
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}></option>
                            @endforeach
                          </select>
                          <br>
                          <label>Nama Produk</label></br>
                          <input type="text" name="nama_produk" id="nama_produk" class="form-control"></br>
                          <label>Merk</label></br>
                          <input type="text" name="merk" id="merk" class="form-control"></br>
                          <label>Harga Beli</label></br>
                          <input type="number" name="harga_beli" id="harga_beli" class="form-control"></br>
                          <label>Diskon</label></br>
                          <input type="number" name="diskon" id="diskon" class="form-control"></br>
                          <label>Harga Jual</label></br>
                          <input type="number" name="harga_jual" id="harga_jual" class="form-control"></br>
                          <label>Stok</label></br>
                          <input type="number" name="stok" id="stok" class="form-control"></br>
                          <input type="submit" value="Save" class="btn btn-primary">
                          <span style="float: center">
                          <a class="btn btn-secondary" href="{{ route('produk.index') }}"> Cancel</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                </br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
@stop