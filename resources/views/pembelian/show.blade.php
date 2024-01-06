@extends('dashboard.sidebar')
@section('konten')

<div class="col-sm-12">
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <h2><b>Info Transaksi Pembelian</b></h2>
    <div class="btn-wrapper">
        <a class="btn btn-primary"><i class="fas fa-fw fa-id-card"></i></a>
    </div>
  </div>

  <!-- Konten -->
  <div class="content mt-4 mb-4">
    <div class="card col-md-6 mx-auto col-sm-12">
      <div class="card-body">
          <p class="badge badge-success" style="font-size: 15px">Supplier : {{ $pembelian->supplier->nama }}</p>
          <p class="card-text">No Telpon : {{ $pembelian->supplier->telepon }}</p>
          <p class="card-text">Alamat : {{ $pembelian->supplier->alamat }}</p>
      </div>
      <div class="card-body">
        <p class="badge badge-success" style="font-size: 15px">Produk : {{ $pembelian->produk->nama_produk }}</p>
        <p class="card-text">Harga Satuan : {{ $pembelian->produk->harga_beli }}</p>
        <p class="card-text">Jumlah : {{ $pembelian->jumlah }}</p>
        <p class="card-text">Diskon : {{ $pembelian->diskon }}</p>
        <p class="card-text">Total Bayar : {{ $pembelian->bayar }}</p>
      </div>
      <a class="btn btn-primary mt-3 mb-2" href="{{ route('pembelian.index') }}"> Back</a>
    </div>
  </div>
  <!-- End -->

</div>

@endsection