@extends('dashboard.sidebar')
@section('konten')

<div class="container">
    <div class="row">
      <div class="col-sm-12">
          <div class="home-tab">
              <div class="container-fluid">
                  <div class="col-sm-12">
                    <br>
                    <h2><b class="row justify-content-center">Detail Transaksi</b></h2>
                    </br>
                  </div>
              </div>
            <!-- Konten -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="badge badge-success">ID Transaksi : {{ $pembelian->id_pembelian }}</h5>
                        </div>                  
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="badge badge-success">ID Supplier : {{ $pembelian->supplier_id }}</h5>
                            <p class="card-text">Supplier : {{ $pembelian->supplier->supplier_name }}</p>
                            <p class="card-text">No Telpon : {{ $pembelian->supplier->supplier_phone }}</p>
                            <p class="card-text">Alamat : {{ $pembelian->supplier->supplier_address }}</p>
                        </div>                  
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="badge badge-success">ID Produk : {{ $pembelian->id_produk }}</h5>
                            <p class="card-text">Produk : {{ $pembelian->produk->nama_produk ?? 'lainnya' }}</p>
                            <p class="card-text">Harga Satuan : {{ $pembelian->produk->harga_beli ?? '-' }}</p>
                            <p class="card-text">Jumlah : {{ $pembelian->jumlah }}</p>
                            <p class="card-text">Diskon : {{ $pembelian->diskon }}</p>
                            <p class="card-text">Total Bayar : {{ $pembelian->bayar }}</p>
                            <span style="float: right">
                            <a class="btn btn-primary" href="{{ route('pembelian.index') }}"> Back</a>
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