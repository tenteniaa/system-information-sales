@extends('dashboard.sidebar')
@section('konten')

<div class="col-sm-12">
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <h2><b>Info Produk</b></h2>
    <div class="btn-wrapper">
        <a class="btn btn-primary"><i class="fas fa-fw fa-cubes"></i></a>
    </div>
  </div>

  <!-- Konten -->
  <div class="content mt-4 mb-4">
    <div class="card col-md-6 mx-auto col-sm-12">
      <div class="card-body">
          <p class="badge badge-success" style="font-size: 15px">{{ $produk->kode_produk }}</p>
          <p class="card-text">Nama : {{ $produk->nama_produk }}</p>
          <p class="card-text">Merk : {{ $produk->merk }}</p>
          <p class="card-text">Kategori : {{ $produk->kategori->nama_kategori ?? 'lainnya' }}</p>
          <p class="card-text">Harga Beli : Rp {{ number_format($produk->harga_beli, 0, ',', '.') }}</p>
          <p class="card-text">Harga Jual : Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}</p>
          <p class="card-text">Diskon : {{ $produk->diskon }} %</p>
          <p class="card-text">Stok : {{ $produk->stok }}</p>
          <a class="btn btn-primary mt-5" href="{{ route('produk.index') }}"> Back</a>
      </div>
    </div>
  </div>
  <!-- End -->

</div>

@endsection