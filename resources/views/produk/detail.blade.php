@extends('dashboard.sidebar')
@section('konten')

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="home-tab">
        <div class="container-fluid">
          <div class="col-sm-12">
            <br>
            <h2><b class="row justify-content-center">Produk</b></h2>
            </br>
          </div>
        </div>
        <!-- Konten -->
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <h5 class="badge badge-success">ID : {{ $produk->id_produk }}</h5>
                <p class="card-text">Nama : {{ $produk->nama_produk }}</p>
                <p class="card-text">Kategori : {{ $produk->kategori->nama_kategori ?? 'lainnya' }}</p>
                <p class="card-text">Merk : {{ $produk->merk }}</p>
                <p class="card-text">Harga Beli : {{ $produk->harga_beli }}</p>
                <p class="card-text">Harga Jual : {{ $produk->harga_jual }}</p>
                <p class="card-text">Diskon : {{ $produk->diskon }}</p>
                <p class="card-text">Stok : {{ $produk->stok }}</p>
                <span style="float: right">
                <a class="btn btn-primary" href="{{ route('produk.index') }}"> Back</a>
              </div>                  
            </div>
          </div>
        </div>
        </br>
      </div>
    </div>
  </div>
</div>

@endsection