@extends('dashboard.sidebar')
@section('konten')

<div class="col-sm-12">
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <h2><b>Tambah Transaksi Pembelian</b></h2>
    <div class="btn-wrapper">
        <a class="btn btn-primary"><i class="fas fa-fw fa-id-card"></i></a>
    </div>
  </div>

  <!-- Konten -->
  <div class="content mt-4 mb-4">
      <div class="card col-md-7 mx-auto col-sm-12">
        <div class="card-body">
          <form action="{{ route('pembelian.store') }}" method="post">
            @csrf
            <label>Pilih Supplier</label></br>
            <select name="id_supplier" id="id_supplier" class="form-control select2" style="width:100%">
                <option disable value>Pilih Supplier</option>
                @foreach ($supplier as $item)
                    <option value="{{ $item->id_supplier }}">{{ $item->nama }}</option>
                @endforeach
            </select><br>
            <label>Pilih Produk</label></br>
            <select name="id_produk" id="id_produk" class="form-control select2" style="width:100%">
                <option disable value>Pilih Produk</option>
                @foreach ($produk as $item)
                    <option value="{{ $item->id_produk }}">{{ $item->nama_produk }}</option>
                @endforeach
            </select><br>
            <label>Jumlah</label></br>
            <input type="number" name="jumlah" id="jumlah" class="form-control"></br>
            <label>Diskon</label></br>
            <input type="number" name="diskon" id="diskon" class="form-control"></br>
            <label>Bayar</label></br>
            <input type="number" name="bayar" id="bayar" class="form-control"></br>
            <div class="text-right">
              <a class="btn btn-secondary" href="{{ route('pembelian.index') }}"> Cancel</a>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
  </div>
  <!-- End -->
</div>
 
@endsection