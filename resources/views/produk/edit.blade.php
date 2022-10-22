@extends('dashboard.sidebar')
@section('konten')

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="home-tab">
        <div class="container-fluid">
          <div class="col-sm-12">
            <br>
            <h2><b class="row justify-content-center">Edit Produk</b></h2>
            </br>
          </div>
        </div>
        <!-- Konten -->
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">                           
                <form action="{{ url('produk/' .$produk->id) }}" method="post">
                  {!! csrf_field() !!}
                  @method("PATCH")
                  <input type="hidden" name="id" id="id" value="{{$produk->id}}" id="id" />
                  <label>ID</label></br>
                  <input type="text" name="id_produk" disabled="disabled" id="id_produk" value="{{$produk->id_produk}}" class="form-control"></br>
                  <label>Nama</label></br>
                  <input type="text" name="nama_produk" id="nama_produk" value="{{$produk->nama_produk}}" class="form-control"></br>
                  <select name="id_kategori" id="id_kategori" class="form-control select2" style="width:100%">
                    <option disable value>Pilih Kategori</option>
                    @foreach ($kategori as $item)
                    <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}></option>
                    @endforeach
                  </select>
                  <br>
                  <label>Merk</label></br>
                  <input type="text" name="merk" id="merk" value="{{$produk->merk}}" class="form-control"></br>
                  <label>Harga Beli</label></br>
                  <input type="number" name="harga_beli" id="harga_beli" value="{{$produk->harga_beli}}" class="form-control"></br>
                  <label>Harga Jual</label></br>
                  <input type="number" name="harga_jual" id="harga_jual" value="{{$produk->harga_jual}}" class="form-control"></br>
                  <label>Diskon</label></br>
                  <input type="number" name="diskon" id="diskon" value="{{$produk->diskon}}" class="form-control"></br>
                  <label>Stok</label></br>
                  <input type="number" name="stok" id="stok" value="{{$produk->stok}}" class="form-control"></br>
                  <input type="submit" value="Update" class="btn btn-primary">
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
 
@stop