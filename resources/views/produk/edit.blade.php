@extends('dashboard.sidebar')
@section('konten')

<div class="col-sm-12">
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <h2><b>Edit Produk</b></h2>
    <div class="btn-wrapper">
        <a class="btn btn-primary"><i class="fas fa-fw fa-cubes"></i></a>
    </div>
  </div>

  <!-- Konten -->
  <div class="content mt-4 mb-4">
      <div class="card col-md-7 mx-auto col-sm-12">
        <div class="card-body">
          <form action="{{ route('produk.update', ['id' => $produk->id_produk]) }}" method="post">
            @csrf
            <label>Nama Produk</label></br>
            <input type="text" name="nama_produk" id="nama_produk" value="{{$produk->nama_produk}}" class="form-control"></br>
            <label>Kategori</label></br>
            <select name="id_kategori" id="id_kategori" class="form-control select2" style="width:100%">
              <option disable value>Pilih Kategori</option>
              @foreach ($kategori as $item)
              <option value="{{ $item->id_kategori }}" {{ $item->id_kategori == $produk->id_kategori ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
              @endforeach
            </select><br>
            <label>Merk</label></br>
            <input type="text" name="merk" id="merk" value="{{$produk->merk}}" class="form-control"></br>
            <label>Harga Beli</label></br>
            <input type="number" name="harga_beli" id="harga_beli" value="{{$produk->harga_beli}}" class="form-control">
            <div id="formattedHargaBeli"></div></br>
            <label>Diskon</label></br>
            <input type="number" name="diskon" id="diskon" value="{{$produk->diskon}}" class="form-control"></br>
            <label>Harga Jual</label></br>
            <input type="number" name="harga_jual" id="harga_jual" value="{{$produk->harga_jual}}" class="form-control">
            <div id="formattedHargaJual"></div></br>
            <label>Stok</label></br>
            <input type="number" name="stok" id="stok" value="{{$produk->stok}}" class="form-control"></br>
            <div class="text-right">
              <a class="btn btn-secondary" href="{{ route('produk.index') }}"> Cancel</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
  </div>
  <!-- End -->
  
</div>
 
@endsection

@push('scripts')
<script>
	// Fungsi untuk format angka menjadi format IDR
  function formatIDR(angka) {
      return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(angka);
  }

  // Fungsi untuk memperbarui tampilan mata uang
  function updateFormattedValue(inputId, formattedId) {
      var inputValue = $(inputId).val();
      var formattedValue = formatIDR(inputValue);
      $(formattedId).text(formattedValue);
  }

  // Panggil fungsi pertama kali untuk menginisialisasi tampilan mata uang
  updateFormattedValue('#harga_beli', '#formattedHargaBeli');
  updateFormattedValue('#harga_jual', '#formattedHargaJual');

  // Tambahkan penanganan peristiwa saat nilai input berubah
  $('#harga_beli').on('input', function() {
      updateFormattedValue('#harga_beli', '#formattedHargaBeli');
  });

  $('#harga_jual').on('input', function() {
      updateFormattedValue('#harga_jual', '#formattedHargaJual');
  });
</script>
@endpush
