@extends('dashboard.sidebar')
@section('konten')

<div class="container">           
  <div class="row">
    <div class="col-sm-12">
      <div class="home-tab">
        <div class="container-fluid">
            <div class="col-sm-12">
                <br>
                <h2><b class="row justify-content-center">Tambah Transaksi Pembelian</b></h2>
                </br>
            </div>
        </div>
        <!-- Konten -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pembelian.store') }}" method="post">
                            {!! csrf_field() !!}
                            <label>ID Transaksi</label></br>
                            <input type="text" name="id_pembelian" id="id_pembelian" class="form-control"></br>
                            <select name="supplier_id" id="supplier_id" class="form-control select2" style="width:100%">
                                <option disable value>Pilih Supplier</option>
                                @foreach ($supplier as $item)
                                    <option value="{{ $item->supplier_id }}">{{ $item->supplier_name }}></option>
                                @endforeach
                            </select>
                            <br><br>
                            <select name="id_produk" id="id_produk" class="form-control select2" style="width:100%">
                                <option disable value>Pilih Produk</option>
                                @foreach ($produk as $item)
                                    <option value="{{ $item->id_produk }}">{{ $item->nama_produk }}></option>
                                @endforeach
                            </select>
                            <br>
                            <label>Jumlah</label></br>
                            <input type="number" name="jumlah" id="jumlah" class="form-control"></br>
                            <label>Diskon</label></br>
                            <input type="number" name="diskon" id="diskon" class="form-control"></br>
                            <label>Bayar</label></br>
                            <input type="number" name="bayar" id="bayar" class="form-control"></br>
                            <input type="submit" value="Save" class="btn btn-primary">
                            <span style="float: center">
                            <a class="btn btn-secondary" href="{{ route('pembelian.index') }}"> Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </br>
    </div>
</div>
 
@stop